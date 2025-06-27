<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'shopEasy',
            'email' => 'admin@shopeasy.com',
            'role' => Roles::Admin,
            'password' => Hash::make("AdminPass@123")
        ]);
    }
}
