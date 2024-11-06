<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['department_name' => 'HR', 'location' => 'Solo'],
            ['department_name' => 'IT', 'location' => 'Surabaya'],
            ['department_name' => 'Finance', 'location' => 'Bandung'],
            ['department_name' => 'Marketing', 'location' => 'Solo'],
            ['department_name' => 'Operations', 'location' => 'Solo'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
