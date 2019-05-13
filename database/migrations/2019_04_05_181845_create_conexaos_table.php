<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConexaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_conexoes', function (Blueprint $table) {
            $table->increments('id_conexao');
            $table->unsignedInteger('mentorado_id_mentorado');
            $table->unsignedInteger('mentor_id_mentor');
            $table->unsignedInteger('assunto_id_assunto');
            $table->timestamp('dt_fim')->nullable();
            $table->timestamp('dt_inicio')->nullable();
            $table->tinyInteger('ds_status');
            $table->foreign('assunto_id_assunto')
                    ->references('id_assunto')
                    ->on('tb_assuntos')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('mentorado_id_mentorado')
                    ->references('id_mentorado')
                    ->on('tb_mentorados')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('mentor_id_mentor')
                    ->references('id_mentor')
                    ->on('tb_mentores')
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
        Schema::dropIfExists('tb_conexoes');
    }
}
