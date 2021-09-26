<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Users
        DB::table('users')->insert([
            'name'              => 'José Guerrero',
            'email'             => 'jose.guerrero.carrizo@gmail.com',
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'created_at'        => now(),
            'updated_at'        => now(),
            'remember_token'    => Str::random(10),
            'email_verified_at' => now(),
        ]);

        # Oauth clients
        DB::table('oauth_clients')->insert([
            "user_id" => null,
            "name" => "Laravel Password Grant Client",
            "secret" => "DcvcvJ2xffk2c8ieYi1gq8vZ6lpNCO7DR6IrG3Ta",
            "provider" => "users",
            "redirect" => "http:\/\/localhost",
            "personal_access_client" => false,
            "password_client" => true,
            "revoked" => false,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        # Oauth access tokens
        DB::table('oauth_access_tokens')->insert([
            "id" => "5f114c7e07a3d8196013d115fcd3b573ac844aede39b2789b2b3218ae4d11e684c507f8b0aa5e576",
            "user_id" => 1,
            "client_id" => 1,
            "name" => null,
            "scopes" => "[]",
            "revoked" => false,
            "created_at" => now(),
            "updated_at" => now(),
            "expires_at" => now(),
        ]);

        # Oauth refresh tokens
        DB::table('oauth_refresh_tokens')->insert([
            "id" => "6e308c898e4b52a503cd85e86d067dbce6a57de99e34d042245780692b902a4d96fa3ad0b599cde0",
            "access_token_id" => "5f114c7e07a3d8196013d115fcd3b573ac844aede39b2789b2b3218ae4d11e684c507f8b0aa5e576",
            "revoked" => false,
            "expires_at" => "2022-08-29T17:57:31.000Z"
        ]);
    }
}
