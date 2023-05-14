<?php

namespace Database\Seeders;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            // Admin
            [
                'id' => Uuid::uuid4()->toString(),
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // Vendor
            [
                'id' => Uuid::uuid4()->toString(),
                'name' => 'Ferdinal Vendor',
                'username' => 'vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'vendor',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // User or Customer
            [
                'id' => Uuid::uuid4()->toString(),
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'user',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
