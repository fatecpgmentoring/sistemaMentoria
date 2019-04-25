<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuntoMentoradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_assunto_mentorados', function (Blueprint $table) {
            $table->increments('id_assunto_mentorado');
            $table->unsignedInteger('id_ams_mentorado');
            $table->unsignedInteger('id_ams_assunto');
            $table->foreign('id_ams_mentorado')
                    ->references('id_mentorado')
                    ->on('mentorados')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('id_ams_assunto')
                    ->references('id_assunto')
                    ->on('assuntos')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assunto_mentorados');
    }
}
