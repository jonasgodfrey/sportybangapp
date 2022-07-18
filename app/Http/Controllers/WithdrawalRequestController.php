<?php

namespace App\Http\Controllers;

use App\Mail\CapitalWithdrawalRequestEmail;
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

        if( $user->subscription === null ) {
            $withdrawal_status = null;
            $subscription = null;
            $days_left_string = null;
        } else {
            $end_date = $user->subscription->end_date;
            $days_left_string = ( new \Carbon\Carbon )->diffForHumans( $end_date ) . ' withdrawal';
            $subscription = $user->subscription;

            if( Carbon::today()->gte( $end_date ) ) {
                $withdrawal_status = 'active';
            } else {
                $withdrawal_status = 'inactive';
            }

        }

        if( Gate::allows( 'admin' ) ) {
            return view( 'admin.withdrawal.index' )->with( [
                'subscription'      => $subscription,
                'days_left_string'  => $days_left_string,
                'withdrawal_status' => $withdrawal_status,
            ] );
        }

        return null;
    }

    final public function withdraw_capital() {

        $user = Auth::user();
        $due_date = Carbon::parse( $user->subscription->end_date );

        if( ( (int)$user->subscription->profit_increase_count === 0 ) && ( Carbon::today()->lt( $due_date ) ) ) {
            Session::flash( 'flash_message', 'You Cannot perform this action, withdrawal date not reached !' );
            return redirect()->back();
        }

        $amount = $user->subscription->amount;
        try {
            $due_date = Carbon::parse( $due_date );

            $datax = [
                'name'           => $user->name,
                'phone'          => $user->phone,
                'bank_name'      => $user->bank_account_detail->bank_name,
                'account_number' => $user->bank_account_detail->account_number,
                'account_name'   => $user->bank_account_detail->account_name,
                'total_amount'   => number_format( $amount ),
                'due_date'       => $due_date->diffForHumans() . ' (' . $due_date->format( 'M d Y' ) . ')',
            ];

            Mail::to( [ 'godfreyjtech2020@gmail.com', 'delightiworima19@gmail.com' ] )->send( new CapitalWithdrawalRequestEmail( $datax ) );

        } catch ( \Throwable $th ) {
            return $th->getMessage() . PHP_EOL . $th->getFile();
        }

        $user->subscription->update( [
            'amount' => 0,
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
            'title'   => "New Capital Withdrawal Requested",
            'message' => 'a new capital withdrawal was requested and completed on ' . Carbon::today(),
        ] );

        Session::flash( 'flash_message', 'A new capital withdrawal was requested, please wait as processing might take up to a week!' );

        return redirect()->back();
    }

    public function withdraw( Request $request ) {

        $user = Auth::user();
        $end_date = $user->subscription->end_date;
        $start_date = $user->subscription->start_date;
        $amount = $user->subscription->cumulative_profit;

        if( $user->bank_account_detail === null ) {
            Session::flash( 'flash_message', 'You Cannot perform this action, please add account details !' );

            return redirect( '/account-details' );
        }

        if( Carbon::today()->gte( $end_date ) ) {
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

                Mail::to( [ 'godfreyjtech2020@gmail.com', 'delightiworima19@gmail.com' ] )->send( new WithdrawalRequestEmail( $datax ) );

            } catch ( \Throwable $th ) {
                return $th->getMessage() . PHP_EOL . $th->getFile();
            }

            if( $user->subscription->amount === 0 ) {
                $user->subscription->update( [
                    'profit_increase_count' => $user->subscription->profit_increase_count + 1,
                    'cumulative_profit'     => 0,
                    'current_profit'        => 0,
                    'status'                => 'expired',
                ] );
            } else {
                $user->subscription->update( [
                    'profit_increase_count' => $user->subscription->profit_increase_count + 1,
                    'cumulative_profit'     => 0,
                    'current_profit'        => 0,
                ] );
            }

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
            Session::flash( 'error_message', 'You Cannot perform this action, withdrawal date not reached !' );

            return redirect()->back();
        }

        Session::flash( 'success_message', 'A new withdrawal was requested and completed!' );

        return redirect( '/dashboard' );

    }

}
