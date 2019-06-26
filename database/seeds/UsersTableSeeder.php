<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mozika.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Vendedor 1',
            'email' => 'ven1@mozika.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Vendedor 2',
            'email' => 'ven2@mozika.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
