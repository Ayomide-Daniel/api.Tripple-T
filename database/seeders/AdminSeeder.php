<?php

namespace Database\Seeders;

use App\Enums\RoleNameEnum;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'ayomidedaniel00@gmail.com',
            'phone_number' => '09035294280',
            'password' => 'password', // this is encrypted in the User model
        ]);

        UserRole::create([
            'user_id' => 1,
            'role_id' => 1,
        ]);        
    }
}
