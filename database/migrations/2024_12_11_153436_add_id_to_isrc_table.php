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
        Schema::table('isrc', function (Blueprint $table) {
            $table->id(); //agrega la columna id como primaryKey autoincremental//
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('isrc', function (Blueprint $table) {
            $table->dropColumn('id'); //caso en el que se revierta la migracion//
        });
    }
};
