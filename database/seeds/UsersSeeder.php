<?php

use Illuminate\Database\Seeder;
use imake\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create(
            [
                "name" => "John",
                "last_name" => "doe",
                "email" => "vendor@imake.am",
                "password" => Hash::make("password"),
                "is_vendor" => true,
                "activated" => true,
                "created_at" => \Illuminate\Support\Carbon::now(),
                "updated_at" => \Illuminate\Support\Carbon::now(),
            ]
        );
       User::create(
            [
                "name" => "Jorik",
                "last_name" => "Sargsyan",
                "email" => "user@imake.am",
                "password" => Hash::make("password"),
                "is_vendor" => false,
                "activated" => true,
                "created_at" => \Illuminate\Support\Carbon::now(),
                "updated_at" => \Illuminate\Support\Carbon::now(),
            ]
        );
    }
}
