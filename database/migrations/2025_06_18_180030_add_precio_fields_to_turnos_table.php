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
        $table->decimal('precio_total', 10, 2)->nullable();
        $table->decimal('descuento', 10, 2)->nullable();
        $table->decimal('precio_final', 10, 2)->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('turnos', function (Blueprint $table) {
        $table->dropColumn(['precio_total', 'descuento', 'precio_final']);
    });
    }
};
