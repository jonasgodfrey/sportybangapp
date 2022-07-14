<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insertOrIgnore([
            [
                'name' => 'admin',
                'description' =>
                    'A user who has access to all the administration features on this platform.',
            ],
            [
                'name' => 'manager',
                'description' =>
                    'A user that manages the account_details.',
            ],
            [
                'name' => 'accountant',
                'description' =>
                    'A user that manages the financial assets of the account_details.',
            ],
            [
                'name' => 'artisan',
                'description' =>
                    'A user that carries out maintenance/repairs of account_details infrastructure.',
            ],
            [
                'name' => 'tenant',
                'description' =>
                    'A user that rents out a unit in a account_details.',
            ],
        ]);

    }
}
