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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profileRentalId')->unsigned();
            $table->integer('totalPendapatan')->nullable();
            $table->integer('totalPenarikan')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('profileRentalId')->references('id')->on('profile_rentals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
