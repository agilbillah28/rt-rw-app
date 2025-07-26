<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();

            // Sesuai dengan FormulirController
            $table->string('nik', 16); // digunakan dalam validasi dan penyimpanan
            $table->string('nama_lengkap');
            $table->string('jenis_surat');
            $table->text('keterangan')->nullable();
            $table->string('file_surat')->nullable(); // hasil upload dari admin (balasan)
            $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
            $table->string('file_balasan')->nullable(); // jika ingin file tambahan selain file_surat

            $table->timestamps();

            // Opsional, jika kamu ingin validasi relasi nik dengan tabel warga:
            // $table->foreign('nik')->references('nik')->on('warga')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
