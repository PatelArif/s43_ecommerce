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
    Schema::create('donations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable();
        $table->unsignedBigInteger('order_id')->nullable();
        $table->decimal('amount', 10, 2);
        $table->timestamps();

        // Optional foreign keys
        $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
