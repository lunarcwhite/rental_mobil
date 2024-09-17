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
        Schema::create('g_p_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mobilId')->unsigned()->nullable();
            $table->string('imei')->nullable()->default('text');
            $table->string('key')->nullable()->default('text');
            $table->foreign('mobilId')->references('id')->on('mobils')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('g_p_s');
    }
};
