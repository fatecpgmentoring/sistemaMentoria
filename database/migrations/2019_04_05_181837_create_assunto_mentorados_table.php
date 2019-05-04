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
            $table->unsignedInteger('mentorado_id_mentorado');
            $table->unsignedInteger('assunto_id_assunto');
            $table->foreign('mentorado_id_mentorado')
                    ->references('id_mentorado')
                    ->on('tb_mentorados')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('assunto_id_assunto')
                    ->references('id_assunto')
                    ->on('tb_assuntos')
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
