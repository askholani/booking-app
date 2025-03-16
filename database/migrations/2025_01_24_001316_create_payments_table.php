<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->decimal('amount', 10, 2);                                 // Jumlah pembayaran
            $table->enum('status', ['pending', 'completed', 'canceled']);     // Status pembayaran
            $table->string('order_id')->unique();                             // ID unik dari Midtrans
            $table->string('payment_type')->nullable();                       // Tipe pembayaran (bank_transfer, credit_card, e-wallet)
            $table->json('response_data')->nullable();                        // Data respons dari Midtrans (JSON format)
            $table->date('payment_date')->nullable();                         // Tanggal pembayaran (bisa null hingga selesai)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
