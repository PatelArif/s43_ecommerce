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
    Schema::table('categories', function (Blueprint $table) {
        $table->string('sub_title')->nullable()->after('name'); // change 'name' to column after which you want
    });
}

public function down(): void
{
    Schema::table('categories', function (Blueprint $table) {
        $table->dropColumn('sub_title');
    });
}

};
