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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_jenis');
            $table->date('tanggal_pengajuan');
            $table->string('status_pengajuan')->default('Mengajukan');
            $table->text('alasan_penolakan')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis_surat')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_user')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
