<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Paystack;

class PaymentController extends Controller {

    /**
     * Redirect the User to Paystack Payment Page
     *
     * @return Url
     */
    public function redirectToGateway() {
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch ( \Exception $e ) {
            dd( $e );

            return Redirect::back()->withMessage( [ 'msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error' ] );
        }
    }

    /**
     * Obtain Paystack payment information
     *
     * @return void
     */
    public function handleGatewayCallback() {
        $paymentDetails = Paystack::getPaymentData();

        $user = Auth::user();
        $package = json_decode( $paymentDetails[ 'data' ][ 'metadata' ][ 'plan_type' ] );
        $amount = substr( $paymentDetails[ 'data' ][ 'amount' ], 0, -2 );
        $payDate = $paymentDetails[ 'data' ][ 'created_at' ];
        $duedate = Carbon::today()->addDays( 7 );
        $status = $paymentDetails[ 'data' ][ 'status' ];
        $compute_percent = ( 30 / 100 ) * $amount;
        $output_amount = $compute_percent;


        if( $status === 'success' ) {
            $subscription = UserSubscription::create( [
                'user_id'       => $user->id,
                'start_date'    => Carbon::parse( $payDate ),
                'end_date'      => $duedate,
                'status'        => 'active',
                'plan_type'     => $package,
                'amount'        => $amount,
                'output_amount' => $output_amount,
            ] );

            Transactions::create( [
                'user_id'          => $user->id,
                'name'             => $user->name,
                'amount'           => $amount,
                'transaction_type' => 'deposit',
                'action_date'      => Carbon::today(),
                'status'           => 'deposited',
            ] );

            if( $subscription ) {
                Session::flash( 'flash_message', 'Subscription Successful !' );

                return redirect( 'dashboard' );
            }
        }

    }
}
