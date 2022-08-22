<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use App\Models\Wallet;
use App\Models\Webhook;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    public function wiredbankingWebhook(Request $request)
    {
        logInfo($request->all(), "Wiredbanking Webhook Incoming");

        $validation = Validator::make($request->all(), [
            "account_number" => 'required',
            "amount" => 'required|numeric',
            "transaction_reference" => 'required|string',
            "narration" => 'required',
            "transaction_date" => 'required'
        ]);

        if ($validation->fails()) {
            $ra = array("status" => false, "message" => $validation->errors()->all()[0]);
            return response()->json($ra, 406);
        }

        $signature = $request->header('ApiKey');

        // $localSignature = env('APP_MODE') == 'live' ? config('wiredbanking.api_key') : config('wiredbanking.api_key');
        $localSignature = "00oj6ifj4CbVy9TQolHsQxN8zGThpoj0";

        \logInfo("remote: $signature, local: $localSignature", "Signature difference");

        if ($signature != $localSignature) {
            return response()->json(['status' => false, 'message' => "Invalid Api Credentials"], 400);
        }

        try {
            $webhook = Transactions::where('transaction_reference', $request->sessionId)->first();

            if ($webhook) {
                return response()->json(['status' => false, 'message' => "Duplicate Transaction"]);
            }

            Webhook::create([
                'webhook_body' => json_encode($request->all())
            ]);

            $account = Wallet::where('account_number', $request->account_number)->first();

            if ($account) {

                $transaction = Transactions::create([
                    "balance_before" => $account->balance,
                    "amount" => $request->amount,
                    "balance_after" => $account->balance + $request->amount,
                    "description" => $request->narration,
                    "transaction_reference" => $request->transaction_reference,
                    "transaction_remarks_id" => 2,
                    "transaction_type_id" => 1,
                    "transaction_date" => $request->transaction_date,
                    "credit_debit_type_id" => 1,
                    "created_date"  => date('Y-m-d'),
                    "created_by" => 1
                ]);

                $account->balance += $request->amount;
                $account->save();

                $currentDate = Carbon::now();

                // $message = "Credit Amt:$originalAmount Desc: $desc Avail Bal:$balanceAfter Date:$currentDate Ref:$request->sessionId";

                // $smsstate = sendSMS($customer->id, $message, true, true, 'Credit Transaction');

                // logInfo($smsstate);

                return response()->json(['status' => true, "message" => 'Webhook handled Successfully']);
            }
        } catch (Exception $e) {
            logInfo($e->getMessage(), "lavel error");
            return response()->json(['status' => false, 'message' => 'Error! Failed to handled webhook'], 400);
        }
    }
}
