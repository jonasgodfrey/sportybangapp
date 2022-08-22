<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_types')->insertOrIgnore([
            ["transaction_type" => "Deposit Transfer"],
            ["transaction_type" => "Withdrawal Transfer"],
            ["transaction_type" => "Bet Placement"]
        ]);
    }
}
