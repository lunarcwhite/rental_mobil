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
        Schema::create('persetujuan_mobils', function (Blueprint $table) {
            $table->id();
            $table->string('alasanPenolakan');
            $table->bigInteger('mobilId')->unsigned();
            $table->timestamps();
            
            $table->foreign('mobilId')->references('id')->on('mobils')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuan_mobils');
    }
};
