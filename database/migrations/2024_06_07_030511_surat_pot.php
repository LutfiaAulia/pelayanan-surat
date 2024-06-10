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
        Schema::create('surat_pot', function (Blueprint $table) {
            $table->id('id_pot');
            $table->unsignedBigInteger('id_pengajuan');
            $table->string('jenis_surat')->default('POT');
            $table->string('nama');
            $table->string('nik');
            $table->decimal('penghasilan');
            $table->string('alasan');
            $table->string('filekk');
            $table->timestamps();

            $table->foreign('id_pengajuan')->references('id_pengajuan')->on('pengajuan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pot');
    }
};
