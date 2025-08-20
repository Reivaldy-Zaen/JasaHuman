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
       Schema::create('pesanan', function (Blueprint $table) {
    $table->id();
    $table->foreignId('pekerja_id')->constrained('pekerja')->cascadeOnDelete();
    $table->foreignId('klien_id')->constrained('klien')->cascadeOnDelete();
    $table->string('nama_pemesan');
    $table->string('email_pemesan');
    $table->enum('status', ['aktif', 'selesai'])->default('aktif');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
