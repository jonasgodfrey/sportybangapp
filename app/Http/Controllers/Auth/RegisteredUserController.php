<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Api\ThirdParty\WiredBankingController;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use App\Mail\EmailVerification;
use App\Models\Bank;
use App\Models\Role;
use App\Models\Wallet;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $wirebankingController = new WiredBankingController();

        $myAccountName = explode(" ", $request->name);

        $firstName = $myAccountName[0];
            $lastName = count($myAccountName) > 1 ? $myAccountName[1] : $firstName;
        $bank = "45";
        $dob = "1980-12-22";

        $createAccount = $wirebankingController->createAccount($request->email, $request->phone, $firstName, $lastName, $bank, $dob);

        if (!$createAccount['status']) {
            return \response()->json($createAccount);
        }

        $regCode = "PLA" . rand(11100, 999999);
        $admin_role = Role::where('name', 'admin')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'admin',
            'owner_id' => null,
            // 'username' => $validatedData['username'],
            'usercode' => $regCode,
            // 'sponsors_id' => $validatedData['referrer_code'],
            'password' => Hash::make($request->password),
        ]);

        $bank = Bank::where('bank_code', $createAccount['data']['bank_code'])->first();
        if (!$bank) {
            return \response()->json(['status' => false, 'message' => "Bank not found"]);
        }

        Wallet::create([
            'user_id' => $user->id,
            'account_number' => $createAccount['data']['account_number'],
            'bank_id' => $bank->id
        ]);

        $user->roles()->attach($admin_role);

        $user->update([
            'otp' => rand(111111, 999999)
        ]);

        $notification = Notification::create([
            'user_id' => $user->id,
            'title' => "New Signup",
            'message' => 'You just signed up welcome to PLA'
        ]);

        $datax = [
            'name' => $user->name,
            'email' => $user->email,
            'otp' => $user->otp
        ];



        try {
            //code...


            Mail::to($user->email)
                ->send(new Welcome($datax));

            Mail::to($user->email)
                ->send(new EmailVerification($datax));
        } catch (\Throwable $th) {
            //throw $th;


        }



        $token = $user->createToken('auth_token')->plainTextToken;

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
