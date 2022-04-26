<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => Hash::make("123456"), // password
            'remember_token' => null,
        ]);
    }
}
