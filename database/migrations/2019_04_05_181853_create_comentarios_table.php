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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id_comentario');
            $table->text('ds_comentario');
            $table->unsignedInteger('fk_comentario_mentor');
            $table->unsignedInteger('fk_comentario_mentorado');
            $table->unsignedInteger('fk_comentario_conexao');
            $table->unsignedInteger('fk_comentario_mentor')
                    ->references('id_mentor')
                    ->on('mentores')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->unsignedInteger('fk_comentario_mentorado')
                    ->references('id_mentorado')
                    ->on('mentorados')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->unsignedInteger('fk_comentario_conexao')
                    ->references('id_conexao')
                    ->on('conexoes')
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
