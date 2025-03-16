<?php
namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'         => 'admin',
            'email'        => 'admin@example.com',
            'password'     => Hash::make('password'), // Password hashing
            'phone_number' => '081234567890',
            'address'      => 'Jl. Admin Utama No.1',
            'username'     => 'admin',
            'role_id'      => 1, // Misalnya level_id 1 untuk admin
        ]);

        // User::create([
        //     'name'         => 'customer',
        //     'email'        => 'customer@example.com',
        //     'password'     => Hash::make('password'), // Password hashing
        //     'phone_number' => '081234567890',
        //     'address'      => 'Jl. Admin Utama No.1',
        //     'username'     => 'customer',
        //     'role_id'      => 2, // Misalnya level_id 1 untuk admin
        // ]);

        $faker = Faker::create();
        for ($i = 0; $i < 40; $i++) {
            User::create([
                'name'         => $faker->name,
                'email'        => $faker->unique()->safeEmail,
                'password'     => Hash::make('password'), // Default password
                'phone_number' => $faker->phoneNumber,
                'address'      => $faker->address,
                'username'     => $faker->userName,
                'role_id'      => 2, // Customer role
            ]);
        }

        // Membuat 10 user dengan data faker
        // \App\Models\User::factory()->count(50)->create();

        // Jika ingin membuat user admin secara manual, bisa ditambahkan seperti berikut:

    }
}
