<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@mehalintl.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '+1 (469) 767-7626',
            'address' => 'Mehal International LLC',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create additional admin (optional)
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mehalintl.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'admin',
            'phone' => '+1 (469) 767-7626',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create Test Customer (optional)
        User::create([
            'name' => 'Test Customer',
            'email' => 'customer@test.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
            'phone' => '+1 234 567 8900',
            'address' => '123 Test Street, Test City',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}
