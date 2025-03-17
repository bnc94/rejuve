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
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->timestamp('fechaNacimiento');
            $table->string('genero');
            $table->string('estadoNacimiento');
            $table->string('alergias');
            $table->string('telefono');
            $table->string('nombreEmergencia');
            $table->string('telefonoEmergencia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('apellidoPaterno');
            $table->dropColumn('apellidoMaterno');
            $table->dropColumn('fechaNacimiento');
            $table->dropColumn('genero');
            $table->dropColumn('estadoNacimiento');
            $table->dropColumn('alergias');
            $table->dropColumn('telefono');
            $table->dropColumn('nombreEmergencia');
            $table->dropColumn('telefonoEmergencia');
        });
    }
};
