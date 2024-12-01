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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID auto increment
            $table->string('name'); // Nama produk
            $table->string('status')->default('pending'); // Status order (default: pending)
            $table->decimal('price', 10, 2); // Harga produk
            $table->integer('total_order')->default(0); // Total jumlah order (default: 0)
            $table->string('image')->nullable(); // Gambar produk (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
