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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('mobilId')->unsigned();
            $table->date('tanggalMulai');
            $table->date('tanggalKembali');
            $table->integer('kodePembayaran');
            $table->tinyInteger('durasiRental');
            $table->boolean('statusPembayaran')->default(0);
            $table->integer('harusBayar');
            $table->integer('totalBayar')->default(0);
            $table->timestamps();
 
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mobilId')->references('id')->on('mobils')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
