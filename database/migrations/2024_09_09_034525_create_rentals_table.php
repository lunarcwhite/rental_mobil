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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('mobilId')->unsigned();
            $table->bigInteger('profileRentalId')->unsigned()->nullable();
            $table->bigInteger('pembayaranId')->unsigned()->nullable();
            $table->boolean('statusBerjalan')->default(1);
            $table->boolean('statusSelesai')->default(0);
            $table->timestamps();
            
            $table->foreign('profileRentalId')->references('id')->on('profile_rentals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pembayaranId')->references('id')->on('pembayarans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mobilId')->references('id')->on('mobils')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
