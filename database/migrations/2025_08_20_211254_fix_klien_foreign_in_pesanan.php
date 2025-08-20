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
    Schema::table('pesanan', function (Blueprint $table) {
        $table->dropForeign(['klien_id']);
        $table->foreign('klien_id')->references('id')->on('klien')->cascadeOnDelete();
    });
}

public function down(): void
{
    Schema::table('pesanan', function (Blueprint $table) {
        $table->dropForeign(['klien_id']);
        $table->foreign('klien_id')->references('id')->on('users')->cascadeOnDelete();
    });
}

};
