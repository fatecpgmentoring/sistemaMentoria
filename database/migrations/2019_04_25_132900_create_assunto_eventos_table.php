<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuntoEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_assunto_eventos', function (Blueprint $table) {
            $table->increments('id_assunto_eventos');
            $table->unsignedInteger('evento_id_evento');
            $table->unsignedInteger('assunto_id_assunto');
            $table->foreign('evento_id_evento')
                    ->references('id_evento')
                    ->on('tb_eventos')
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
        Schema::dropIfExists('assunto_eventos');
    }
}
