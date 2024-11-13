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
        Schema::create('penetapan_wbtbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wbtb_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->date('tanggal_penetapan');
            $table->text('keterangan')->nullable();
            $table->enum('status_verifikasi', ['disetujui', 'ditolak'])->default('disetujui');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penetapan_wbtbs');
    }
};
