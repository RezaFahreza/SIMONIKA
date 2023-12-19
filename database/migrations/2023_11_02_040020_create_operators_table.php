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
        Schema::create('operator', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama');
            $table->string('email')->unique()->nullable();
            $table->string('handphone');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::table('operator', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users'); // Kunci asing ke kolom 'user_id' pada tabel 'users'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operator', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('operator');
    }
};
