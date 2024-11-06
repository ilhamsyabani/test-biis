<?php

namespace Database\Seeders;

use App\Models\Employe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => Hash::make('password'), 
        ]);

        $this->call(DepartmentSeeder::class);
        $this->call(RoleSeeder::class);

        Employe::factory(30)->create(); 
    }
}
