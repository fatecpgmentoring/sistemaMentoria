<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_comentarios', function (Blueprint $table) {
            $table->increments('id_comentario');
            $table->text('ds_comentario');
            $table->unsignedInteger('conexao_id_conexao');
            $table->foreign('conexao_id_conexao')
                    ->references('id_conexao')
                    ->on('tb_conexoes')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
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
        Schema::dropIfExists('comentarios');
    }
}
