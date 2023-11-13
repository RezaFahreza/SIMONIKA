<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('skripsi', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['belum ambil', 'lulus'])->default('belum ambil');
            $table->string('semester')->nullable();
            $table->string('nilai_skripsi')->nullable();
            $table->string('scan_berita_acara_sidang_skripsi')->nullable();
            $table->date('tanggal_lulus_sidang')->nullable();
            $table->integer('lama_studi_semester')->nullable();
            $table->enum('status_validasi', ['PENDING', 'DISETUJUI'])->nullable();
            $table->string('mahasiswa_id');

            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('skripsi', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
        });

        Schema::dropIfExists('skripsi');
    }
};
