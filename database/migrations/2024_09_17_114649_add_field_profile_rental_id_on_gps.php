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
        Schema::table('g_p_s', function (Blueprint $table) {
            $table->bigInteger('profileRentalId')->unsigned()->nullable();
            $table->foreign('profileRentalId')->references('id')->on('profile_rentals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('g_p_s', function (Blueprint $table) {
            $table->dropColumn('profileRentalId');
        });
    }
};
