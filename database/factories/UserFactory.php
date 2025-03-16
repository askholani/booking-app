<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Mengatur Faker untuk menggunakan lokal Indonesia
        $faker = \Faker\Factory::create('id_ID');  // id_ID untuk Indonesia

        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // Default password
            'phone_number' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'username' => $faker->unique()->userName(),
            'level_id' => 2
        ];
    }
}
