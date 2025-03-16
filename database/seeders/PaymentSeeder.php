<?php
namespace Database\Seeders;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $index => $user) {
            if ($index < 10) {
                for ($i = 0; $i < 5; $i++) {
                    Payment::create([
                        'user_id'       => $user->id,
                        'amount'        => rand(10000, 1000000) / 100, // Random amount between 100 and 10000
                        'status'        => 'completed',                // Default status
                        'order_id'      => Str::uuid(),                // Unique order ID
                        'payment_type'  => 'credit_card',              // Example payment type
                        'response_data' => json_encode(['transaction_status' => 'success']),
                        'payment_date'  => now(), // Current date
                    ]);
                }
            }
            Payment::create([
                'user_id'       => $user->id,
                'amount'        => rand(10000, 1000000) / 100, // Random amount between 100 and 10000
                'status'        => 'pending',                  // Default status
                'order_id'      => Str::uuid(),                // Unique order ID
                'payment_type'  => 'bank_transfer',            // Example payment type
                'response_data' => json_encode(['transaction_status' => 'pending']),
                'payment_date'  => now(), // Current date
            ]);
        }
    }
}
