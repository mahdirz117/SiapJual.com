<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('users')->insert([
            'name' => 'Ardi Setyo',
            'email' => 'ardisetyo77@mail.com',
            'password' => Hash::make('1234567')
        ]);
    }
}
