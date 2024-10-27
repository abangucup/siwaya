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
        Schema::create('warisans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->string('nomor_warisan')->unique();
            $table->string('nama_warisan');
            $table->string('slug')->unique();
            $table->enum('status', ['diajukan', 'ditolak', 'ditetapkan'])->default('diajukan');
            $table->date('tanggal_penetapan_warisan')->nullable();
            $table->date('tanggal_verifikasi_warisan')->nullable();
            $table->foreignId('kategori_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('domain_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('kondisi_id')->nullable()->constrained()->onDelete('set null');
            $table->text('deskripsi_warisan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warisans');
    }
};
