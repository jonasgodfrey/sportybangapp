<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $user = Auth::user();

        $investments = $user->subscriptions;
        $transactions = $user->transactions;
        $amount_invested = 0;
        $amount_earned = 0;
        foreach( $investments as $investment ) {
            $amount_invested += $investment->amount;
            $amount_earned += $investment->cumulative_profit;
        }

        $total_investments_amount = number_format( $amount_invested );
        $total_investments_count = count($investments);
        $total_earnings = $amount_earned;
        $total_referrals = 0;

        if( Gate::allows( 'admin' ) ) {
            return view( 'admin.dashboard.index' )->with( [
                'total_investments_amount' => $total_investments_amount,
                'total_investments_count' => $total_investments_count,
                'transactions' => $transactions,
                'total_earnings'    => $total_earnings,
                'total_referrals'   => $total_referrals,
            ] );
        }

        if( Gate::allows( 'manager' ) ) {
            return view( 'users.manager.index' )->with( [] );
        }

        if( Gate::allows( 'accountant' ) ) {
            return view( 'users.accountant.index' )->with( [] );
        }

        if( Gate::allows( 'artisan' ) ) {
            return view( 'users.artisan.index' )->with( [] );
        }

        if( Gate::allows( 'tenant' ) ) {
            return view( 'users.tenants.index' )->with( [] );
        }
    }
}
