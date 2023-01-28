<?php

namespace Database\Seeders;

use App\Enums\RoleNameEnum;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = RoleNameEnum::cases();

        foreach ($roles as $key => $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
