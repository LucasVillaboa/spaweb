<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up()
{
    Schema::table('turnos', function (Blueprint $table) {
        $table->unsignedBigInteger('cliente_id')->nullable()->after('user_id');

        $table->foreign('cliente_id')->references('id')->on('users')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('turnos', function (Blueprint $table) {
        $table->dropForeign(['cliente_id']);
        $table->dropColumn('cliente_id');
    });
}

};