<?php

use Illuminate\Database\Seeder;

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
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Author',
                'email' => 'author@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'author',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ]
        ]);
    }
}