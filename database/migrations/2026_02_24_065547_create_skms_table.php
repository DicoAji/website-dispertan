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
        Schema::create('skms', function (Blueprint $table) {
            $table->id();
            $table->string('tahun', 4); // Contoh: 2026
            $table->string('triwulan'); // Contoh: Triwulan I
            $table->string('file');      // Menyimpan nama file .pdf
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skms');
    }
};
