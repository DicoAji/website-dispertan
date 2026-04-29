<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bidang', function (Blueprint $table) {
            $table->id();
            $table->string('uraian');
            $table->text('deskripsi')->nullable();
            $table->string('kategori');
            $table->string('file')->nullable();
            $table->string('gambar')->nullable();

            // Jika hanya butuh created_at:
            $table->timestamp('created_at')->useCurrent();

            // Opsional: Gunakan $table->timestamps(); jika Anda ingin
            // kolom created_at dan updated_at dibuat otomatis.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bidang');
    }
};
