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
        Schema::create('pkl', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['belum ambil', 'lulus'])->default('belum ambil');
            $table->string('semester')->nullable();
            $table->string('nilai_pkl')->nullable();
            $table->string('scan_berita_acara_seminar_pkl')->nullable();
            $table->enum('status_validasi', ['PENDING', 'DISETUJUI'])->nullable();
            $table->string('mahasiswa_id');

            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('pkl', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
        });

        Schema::dropIfExists('pkl');
    }
};
