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
        User::create([
            'name' => "Admin",
            'role' => "Admin",
            'email' => "admin@admin.com",
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => Hash::make('12345678'),
            'def_password' => '12345678',
        ]);
    }
}
