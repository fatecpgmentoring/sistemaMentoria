<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuntoMentoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_assunto_usuarios', function (Blueprint $table) {
            $table->increments('id_assunto_usuario');
            $table->unsignedInteger('mentor_id_mentor');
            $table->unsignedInteger('assunto_id_assunto');
            $table->foreign('usuario_id_usuario')
                    ->references('id_usuario')
                    ->on('tb_usuarios')
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
        Schema::dropIfExists('tb_assunto_usuarios');
    }
}
