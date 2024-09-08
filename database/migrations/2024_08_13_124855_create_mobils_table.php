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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('namaMobil');
            $table->tinyInteger('jumlahKursi');
            $table->string('gigi');
            $table->integer('harga')->unsigned();
            $table->boolean('statusAktif')->nullable()->default(true);
            $table->boolean('statusPersetujuan')->nullable()->default(false);
            $table->string('gambar')->nullable()->default('text');
            $table->string('deskripsi')->nullable()->default('text');
            $table->string('bahanBakar')->nullable()->default('text');
            $table->string('platMobil')->nullable()->default('text');
            $table->bigInteger('profileRentalId')->unsigned();
            $table->timestamps();

            $table->foreign('profileRentalId')->references('id')->on('profile_rentals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
