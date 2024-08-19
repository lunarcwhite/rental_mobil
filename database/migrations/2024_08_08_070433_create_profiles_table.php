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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 16)->nullable();
            $table->string('namaLengkap')->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->string('alamatTempatTinggal')->nullable()->default('text');
            $table->string('rt')->nullable()->default('text');
            $table->string('rw')->nullable()->default('text');
            $table->string('desa')->nullable()->default('text');
            $table->string('kecamatan')->nullable()->default('text');
            $table->string('noHp')->nullable()->default('text');
            $table->string('kyc')->nullable()->default('text');
            $table->bigInteger('userId')->unsigned();
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
