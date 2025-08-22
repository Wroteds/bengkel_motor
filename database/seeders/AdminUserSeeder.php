<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@bengkel.com'],
            [
                'name' => 'Admin Bengkel',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'profile_photo' => null,
            ]
        );
    }
}
