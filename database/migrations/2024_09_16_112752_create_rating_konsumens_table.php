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
        Schema::create('rating_konsumens', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('bintang');
            $table->string('ulasan')->nullable()->default('text');
            $table->bigInteger('userId')->nullable()->unsigned();
            $table->bigInteger('profileRentalId')->nullable()->unsigned();
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
        Schema::dropIfExists('rating_konsumens');
    }
};
