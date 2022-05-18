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
        DB::table('users')->insert([
            'name' => 'Dao Viet Trung',
            'email' =>'dvtrung@gmail.com',
            'password' => Hash::make('password'),
            'level' => 0,
            'phone' => '0836674168',
        ]);
    }
}
