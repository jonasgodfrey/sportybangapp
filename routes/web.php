<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {

    //Dashboard Route
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/subscription', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscription');

    Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('handleGatewayCallback');

});

/**
 *  Subscription middleware2 wrapper
 * uncomment this and comment the other to enable expired subscription
 * comment and uncomment to enable active subscription
 */

Route::group(['middleware' => ['auth', 'subscribed']], function () {
    //Account Page Get Routes
    Route::get('/account-details', [App\Http\Controllers\AccountDetails::class, 'index'])->name('account_details.index');
    Route::get('/account-details/edit/{id}', [App\Http\Controllers\AccountDetails::class, 'edit'])->name('account_details.edit');

    //Account Page Post Routes
    Route::post('/account-details/add', [App\Http\Controllers\AccountDetails::class, 'store'])->name('account_details.store');
    Route::post('/account-details/update/{id}', [App\Http\Controllers\AccountDetails::class, 'update'])->name('account_details.update');
    Route::post('/account-details/delete', [App\Http\Controllers\AccountDetails::class, 'delete'])->name('account_details.delete');

    //Withdrawal Page Get Routes
    Route::get('/withdrawal', [App\Http\Controllers\WithdrawalRequestController::class, 'index'])->name('withdrawal.index');
    //Withdrawal Page post Routes
    Route::post('/withdrawal/request/', [App\Http\Controllers\WithdrawalRequestController::class, 'withdraw'])->name('withdrawal.request');
    Route::post('/withdrawal/request/capital/', [App\Http\Controllers\WithdrawalRequestController::class, 'withdraw_capital'])->name('withdrawal.request.capital');

});


require __DIR__ . '/auth.php';
