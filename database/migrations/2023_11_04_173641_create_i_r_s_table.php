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
        Schema::create('irs', function (Blueprint $table) {
            $table->id();
            $table->integer('semester_aktif');
            $table->integer('jumlah_sks_diambil');
            $table->string('scan_irs');
            $table->enum('status_validasi', ['PENDING', 'DISETUJUI'])->default('PENDING');
            $table->string('mahasiswa_id');

            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('irs', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
        });

        Schema::dropIfExists('irs');
    }
};
