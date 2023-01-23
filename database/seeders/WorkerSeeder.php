<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Worker',
            'email' => 'admin@gmail.com',
            'phone_number' => '090',
            'password' => Hash::make('password'),
        ]);

        UserRole::create([
            'user_id' => 2,
            'role_id' => 1,
        ]);        
    }
}
