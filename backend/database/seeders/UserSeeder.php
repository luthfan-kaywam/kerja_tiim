<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@example.com', 'access_level' => 1],
            ['name' => 'Manager', 'email' => 'manager@example.com', 'access_level' => 1],
            ['name' => 'Budi Santoso', 'email' => 'budi@example.com', 'access_level' => 0],
            ['name' => 'Siti Aminah', 'email' => 'siti@example.com', 'access_level' => 0],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password123'),
                'access_level' => $user['access_level'],
            ]);
        }
    }
}
