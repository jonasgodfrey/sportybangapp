<?php

namespace App\Http\Controllers;

use App\Models\AccountDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountDetails extends Controller {
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
        $account_details = $user->bank_account_detail;

        return view( 'admin.account_details.index' )->with( [
            'account' => $account_details,
        ] );
    }

    public function store( Request $request ) {
        $user = Auth::user();

        if( $user->bank_account_detail === null ) {
            $account = AccountDetail::create( [
                'user_id'        => $user->id,
                'account_name'   => $request->account_name,
                'account_number' => $request->account_number,
                'bank_name'      => $request->bank_name,
            ] );

            if( $account ) {
                Session::flash( 'flash_message', 'Bank Account Details Added Successfully !' );

                return redirect()->back();
            }
        }

        Session::flash( 'error_message', 'Bank Account Details Already Exist !' );
        return redirect()->back();
    }

    public function edit( int $id ) {
        $user = Auth::user();
        $account_details = $user->bank_account_detail;

        return view( 'admin.account_details.edit' )->with( [
            'account_details' => $account_details,
        ] );
    }

    final public function update( Request $request, int $id ) {
        $validator = Validator::make($request->all(), [
            'account_name' => ['required', 'string', 'max:255'],
            'account_number' =>  ['required', 'int'],
            'bank_name' => ['required', 'string', 'max:255']
        ]);

        $validator->validate();
        # code...
        $account = AccountDetail::where( 'id', $id )->update( [
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bank_name
        ] );

        if($account){
            Session::flash( 'success_message', 'Bank Account Details Updated Successfully !' );
            return redirect('/account-details');
        }

        Session::flash( 'error_message', 'Bank Account Details Update Failed, Try Again Later 😥!' );
        return redirect()->back();
    }

    public function delete( Request $request ) {
        # code...
    }
}
