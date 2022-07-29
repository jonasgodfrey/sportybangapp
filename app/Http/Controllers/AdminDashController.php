<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\UserSubscription;
use App\Models\Transactions;


class AdminDashController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function admindash()
    {
        $user = Auth::user();
        $regusers = User::count();
        $investors = UserSubscription::count();
        $transaction = Transactions::sum('amount');
        // $deposits = Transactions::sum('deposit');

        return view('admin.dashboard.admin')->with([
            // dd($transaction),
            'regusers'=>$regusers,
            'investors'=>$investors,
            'transaction'=>$transaction,
        ]);
    }
    

   
}
