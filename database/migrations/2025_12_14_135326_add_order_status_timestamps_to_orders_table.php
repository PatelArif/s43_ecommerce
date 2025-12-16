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
    Schema::table('orders', function (Blueprint $table) {
        $table->timestamp('approved_at')->nullable();
        $table->timestamp('ready_at')->nullable();
        $table->timestamp('dispatched_at')->nullable();
        $table->timestamp('delivered_at')->nullable();
        $table->timestamp('rejected_at')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
  public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn([
            'approved_at',
            'ready_at',
            'dispatched_at',
            'delivered_at',
            'rejected_at',
        ]);
    });
}
};
