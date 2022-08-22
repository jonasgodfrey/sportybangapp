<?php
// namespace App\helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


if (!function_exists('generateAccountReference')) {
    function generateAccountReference()
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1, 20))), 1, 20);
    }
}

if (!function_exists('generateTransactionReference')) {
    function generateTransactionReference()
    {
        return "WBA" . mt_rand(100000000000, 999999999999);
    }
}

if (!function_exists('user_email')) {
    function user_email()
    {
        $user = Auth::user();
        return $user->email;
    }
}


function moneyFormat($value)
{

    return number_format($value, 2);
}

function moneyFormater($value)
{

    return bcadd($value, '0', 2);
}

function logInfo($content, $title = "No Title")
{
    Log::info("<<<<<<<<<<<<< $title >>>>>>>>>>>>>>>>>>>>>>");
    Log::info($content);
}