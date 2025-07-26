<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin RT',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('passwordadmin'),
            'role' => 'admin', 
        ]);
    }
}
