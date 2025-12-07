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
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->text('shipping_address');
        $table->decimal('subtotal', 10, 2);
        $table->decimal('donation', 10, 2)->default(0);
        $table->decimal('total', 10, 2);
        $table->enum('payment_method', ['scanner', 'bank_transfer']);
        $table->string('payment_slip')->nullable(); // upload proof
        $table->enum('status', ['pending', 'approved'])->default('pending');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
