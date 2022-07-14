<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SubscriptionController extends Controller {
    public function index() {
        $user = Auth::user();

        if( Gate::allows( 'is_subscribed' ) ) {
            return view( 'subscription.active' );
        }

        return view( 'subscription.index' );

    }

    public function users() {
        $user = Auth::user();

        $owner_id = $user->owner_id;
        $owner = User::where( 'id', $owner_id )->first();

        if( $owner->subscriptionStatus( 'active' ) ) {
            abort( '404' );
        } else {
            return redirect( 'subscription.users' );
        }
    }
}
