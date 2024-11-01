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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warisan_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama_lokasi');
            $table->string('slug');
            $table->foreignId('kelurahan_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('kecamatan_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('kabkot_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('provinsi_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
