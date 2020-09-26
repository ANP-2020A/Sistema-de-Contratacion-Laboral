<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserssIdColumnAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiencias', function (Blueprint $table) {
            $table->unsignedBigInteger('postulante_id');
            $table->foreign('postulante_id')->references('id')->on('postulantes')->onDelete('restrict');
        });

        Schema::table('estudios', function (Blueprint $table) {
            $table->unsignedBigInteger('postulante_id');
            $table->foreign('postulante_id')->references('id')->on('postulantes')->onDelete('restrict');
        });

        Schema::table('ofertas', function (Blueprint $table) {
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('restrict');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('area_trabajos')->onDelete('restrict');
        });

        Schema::table('postulacions', function (Blueprint $table) {
            $table->unsignedBigInteger('oferta_id');
            $table->foreign('oferta_id')->references('id')->on('ofertas')->onDelete('restrict');
            $table->unsignedBigInteger('postulante_id');
            $table->foreign('postulante_id')->references('id')->on('postulantes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiencias', function (Blueprint $table) {
            $table->dropForeign(['postulante_id']);
        });
        Schema::table('estudios', function (Blueprint $table) {
            $table->dropForeign(['postulante_id']);
        });

        Schema::table('ofertas', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['postulacions_id']);
            $table->dropForeign(['area_id']);
        });
        Schema::table('postulacions', function (Blueprint $table) {
            $table->dropForeign(['oferta_id']);
            $table->dropForeign(['postulante_id']);
        });

    }
}
