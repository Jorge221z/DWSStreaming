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
        Schema::table('peliculas', function (Blueprint $table) {
            // Agregar la columna isrc_id en la tabla peliculas
            $table->unsignedBigInteger('isrc_id')->nullable()->after('id');
            // Definir la clave foránea apuntando a la tabla isrc
            $table->foreign('isrc_id')->references('id')->on('isrc')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
             // Eliminar la clave foránea primero
    $table->dropForeign('isrc_pelicula_id_foreign');  // Reemplaza con el nombre correcto de la clave foránea si es diferente

    // Ahora puedes eliminar la columna
    $table->dropColumn('id');
        });
    }
};
