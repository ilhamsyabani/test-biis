<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->locale = 'id_ID';

        return [
            'nama' => $this->faker->name,
            'nip' => $this->faker->unique()->numerify('########'),
            'place_birth' => $this->faker->city,
            'date_birth' => $this->faker->date('Y-m-d', '-18 years'),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'id_departemen' => Department::inRandomOrder()->first()->id,
            'id_role' => Role::inRandomOrder()->first()->id,
            'joining_date' => $this->faker->date('Y-m-d', '-1 years'),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }
}
