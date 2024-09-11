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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('profileRentalId')->unsigned();
            $table->string('channel');
            $table->tinyInteger('dibaca')->default(0);
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('profileRentalId')->references('id')->on('profile_rentals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
