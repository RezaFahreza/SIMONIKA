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
        Schema::create('departemen', function (Blueprint $table) {
            $table->string('kode_departemen')->primary();
            $table->string('nama_departemen');
            $table->string('email')->unique()->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    public function down()
    {
        Schema::table('departemen', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('departemen');
    }
};
