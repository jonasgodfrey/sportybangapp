<?php

namespace App\Http\Controllers;

use App\Mail\WithdrawalRequestEmail;
use App\Models\Notification;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class WithdrawalRequestController extends Controller {
    public function index() {
        $user = Auth::user();
        if( $user->transaction->transaction_type !== 'deposit' ) {
            $end_date = null;
            $withdrawal_amount = 'none';
            $days_left = '';
            $sub = null;
            $current_investment = 'none';
            $days_left_string = 'none';

        } else {
            $end_date = $user->subscription->end_date;
            $withdrawal_amount = $user->subscription->output_amount + $user->subscription->amount;
            $days_left = Carbon::today()->diffInDays( $end_date );
            $sub = $user->subscription;
            $current_investment = $user->subscription->amount;
            $days_left_string = ( new \Carbon\Carbon )->diffForHumans( $end_date ) . ' withdrawal';

            if( Carbon::today()->gt( $end_date ) ) {
                $days_left = 'expired';
            } else {
                $days_left = 'active';
            }
        }


        if( Gate::allows( 'admin' ) ) {
            return view( 'admin.withdrawal.index' )->with( [
                'total_earnings'     => $withdrawal_amount,
                'sub'                => $sub,
                'current_investment' => $current_investment,
                'days_left_string'   => $days_left_string,
                'withdraw_time'      => $days_left,
            ] );
        }

        return null;
    }

    public function withdraw( Request $request ) {

        $user = Auth::user();
        $end_date = $user->subscription->end_date;
        $start_date = $user->subscription->start_date;
        $amount = $user->subscription->output_amount + $user->subscription->amount;

        if($user->bank_account_detail === null){
            Session::flash( 'flash_message', 'You Cannot perform this action, please add account details !' );
            return redirect('/account-details');
        }

        if( $user->transaction->transaction_type === 'deposit' ) {
            if( Carbon::today()->gt( $end_date ) ) {

                try {
                    $due_date = Carbon::parse( $end_date );


                    $datax = [
                        'name'           => $user->name,
                        'phone'          => $user->phone,
                        'bank_name'      => $user->bank_account_detail->bank_name,
                        'account_number' => $user->bank_account_detail->account_number,
                        'account_name'   => $user->bank_account_detail->account_name,
                        'total_amount'   => number_format( $amount ),
                        'due_date'       => $due_date->diffForHumans() . ' (' . $due_date->format( 'M d Y' ) . ')',
                    ];

                    Mail::to( ['godfreyjtech2020@gmail.com', 'delightiworima19@gmail.com'] )->send( new WithdrawalRequestEmail( $datax ) );

                } catch ( \Throwable $th ) {
                    return $th;
                }

                $user->subscription->update( [
                    'status' => 'expired',
                ] );

                Transactions::create( [
                    'user_id'          => $user->id,
                    'name'             => $user->name,
                    'amount'           => number_format( $amount ),
                    'transaction_type' => 'withdrawal',
                    'action_date'      => Carbon::today(),
                    'status'           => 'withdrawn',
                ] );


                // publish a notification for the user create action
                $notification = Notification::create( [
                    'user_id' => $user->id,
                    'title'   => "New Withdrawal Requested",
                    'message' => 'a new withdrawal was requested and completed on ' . Carbon::today(),
                ] );
            } else {
                Session::flash( 'flash_message', 'You Cannot perform this action !' );

                return redirect()->back();
            }


        }

        return redirect( '/dashboard' );

    }

}
