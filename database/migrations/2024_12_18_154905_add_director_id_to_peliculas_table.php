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
            $table->unsignedBigInteger('director_id')->nullable(); // Permite nulo si no hay director al inicio
            $table->foreign('director_id')->references('id')->on('director')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() //para hacer rollback//
    {
        Schema::table('peliculas', function (Blueprint $table) {
            // Eliminar la clave foránea
            $table->dropForeign(['director_id']);
            // Eliminar la columna
            $table->dropColumn('director_id');
        });
    }
};
