<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');                 // Relasi ke users
            $table->foreignId('playstation_id')->constrained()->onDelete('cascade');          // Relasi ke playstations
            $table->foreignId('payment_id')->nullable()->constrained()->onDelete('set null'); // Relasi ke payments (opsional)
            $table->dateTime('date');                                                         // Waktu mulai sewa
            $table->decimal('total_price', 10, 2);                                            // Total biaya sewa
            $table->enum('status', ['pending', 'canceled', 'completed'])->default('pending'); // Status booking
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
