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
      Schema::table('turnos', function (Blueprint $table) {
        $table->dropColumn('servicio');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
           Schema::table('turnos', function (Blueprint $table) {
        $table->string('servicio')->nullable(); // por si necesitás revertir
    });
    }
};
