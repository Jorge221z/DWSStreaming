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
            // Agregar la columna peliculas_id en la tabla isrc
            $table->unsignedBigInteger('peliculas_id')->nullable()->after('id');
            // Definir la clave foránea apuntando a la tabla peliculas
            $table->foreign('peliculas_id')->references('id')->on('peliculas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('isrc', function (Blueprint $table) {
            // Eliminar la clave foránea y la columna
            $table->dropForeign(['peliculas_id']);
            $table->dropColumn('peliculas_id');
        });
    }
};
