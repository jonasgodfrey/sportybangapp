<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;
use App\Models\PaymentRecord;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class UserEarningsCheckController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    final public function sendemail(): void {

        $default = User::all();

        $this->checkAndUpdatePaymentStatus( (array)$default, 'none' );

    }

    final public function checkAndUpdatePaymentStatus( array $users ): string|\Illuminate\Http\RedirectResponse {
        foreach( $users as $user ) {
            try {
                $due_date = Carbon::parse( $user->subscription->end_date );
                $cumulative_profit = $user->subscription->cumulative_profit ?? 0;

                if( ( (int)$user->subscription->amount !== 0 ) && (Carbon::today()->gt( $due_date )) ) {
                    $user->subscription->update( [
                        'cumulative_profit'     => $cumulative_profit + $cumulative_profit,
                        'current_profit'        => $cumulative_profit,
                        'profit_increase_count' => $user->subscription->profit_increase_count + 1,
                        'end_date'              => $due_date->addDays( 7 )
                    ] );
                }

            } catch ( \Throwable $th ) {
                return $th->getMessage() . PHP_EOL . $th->getFile();
            }
        }

        return redirect()->back();
    }

}
