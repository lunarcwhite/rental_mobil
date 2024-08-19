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
        Schema::create('profile_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('namaRental')->nullable()->default('text');
            $table->string('alamatRental')->nullable()->default('text');
            $table->string('rtRental')->nullable()->default('text');
            $table->string('rwRental')->nullable()->default('text');
            $table->string('desaRental')->nullable()->default('text');
            $table->string('kecamatanRental')->nullable()->default('text');
            $table->string('noHpRental')->nullable()->default('text');
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
        Schema::dropIfExists('profile_rentals');
    }
};
