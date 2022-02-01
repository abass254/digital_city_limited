<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@dcl.com',
            'password' => Hash::make('pass@admin'),
            'contact' => '0712345678',
            'nhif_no' => '##########',
            'nssf_no' => '##########',
            'id_number' => '########'
        ]);
    }
}
