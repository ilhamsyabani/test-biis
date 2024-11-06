<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $roles = [
            ['role_name' => 'Manager', 'salary' => 12000000],
            ['role_name' => 'Supervisor', 'salary' => 9000000],
            ['role_name' => 'Staff', 'salary' => 7000000],
            ['role_name' => 'Intern', 'salary' => 3000000],
            ['role_name' => 'Engineer', 'salary' => 9500000],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
