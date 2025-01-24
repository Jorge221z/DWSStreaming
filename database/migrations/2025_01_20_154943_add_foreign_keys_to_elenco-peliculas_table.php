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
        Schema::table('elenco_peliculas', function(Blueprint $table){
            $table->foreign('peliculas_id')->references('id')->on('peliculas')->onDelete('cascade');
            $table->foreign('elenco_id')->references('id')->on('elenco')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('elenco_peliculas', function(Blueprint $table){
            $table->dropForeign(['peliculas_id']);
            $table->dropForeign(['elenco_id']);
        });
    }
};
