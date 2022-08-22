<?php

namespace App\Http\Controllers\Api\ThirdParty;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WiredBankingController extends Controller
{

    private $baseUrl;
    private $apiKey;

    function __construct()
    {
        $this->token = "";
        if (env('APP_MODE') == 'test') {

            $this->apiKey = config('wiredbanking.api_key');
            $this->baseUrl = config('wiredbanking.base_url');
        } else {
            $this->apiKey = config('wiredbanking.api_key');
            $this->baseUrl = config('wiredbanking.base_url');
        }
    }



    public function createAccount($email, $phoneNumber, $firstName, $lastName, $bank, $dob)
    {

        $companyReference = "mso3wJJSERLCQojCPyyA";
        $body = [
            "email" => $email,
            "phone" => $phoneNumber,
            "last_name" => $lastName,
            "first_name" => $firstName,
            "preferred_bank" => $bank,
            "dob" => $dob,
            "company" => $companyReference,
        ];

        try {
            $createAccountResponse = $this->wiredbankingPostRequest("api/v1/users/api-register", $body);

            logInfo($createAccountResponse, "Wiredbanking Create Account Response");

            if ($createAccountResponse['status']) {

                return [
                    'status' => true,
                    'message' => "Account Created Successfully",
                    'data' => $createAccountResponse['data']
                ];
            } else {
                return ['status' => false, 'message' => $createAccountResponse['message']];
            }
        } catch (Exception $e) {
            logInfo($e->getMessage(), "Wiredbanking Error");

            return ['status' => false, 'message' => 'Error Creating Account. Kindly contact support for assistance'];
        }
    }


    public function wiredbankingPostRequest($endpoint, $body)
    {
        \logInfo("$this->baseUrl$endpoint", "Base url");
        $response = Http::withHeaders($this->wiredbankingHeader())->post("$this->baseUrl$endpoint", $body);
        return $response->json();
    }

    public function wiredbankingGetRequest($endpoint)
    {
        // logInfo("$this->baseUrl$endpoint", "Convertion url");
        $response = Http::withHeaders($this->wiredbankingHeader())->get("$this->baseUrl$endpoint");
        return $response->json();
    }

    public function wiredbankingHeader()
    {
        $header = [
            'Content-Type' => 'application/json',
            'ApiKey' => $this->token
        ];

        return $header;
    }
}
