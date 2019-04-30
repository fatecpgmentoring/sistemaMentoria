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
            $table->unsignedInteger('id_c_mentorado');
            $table->unsignedInteger('id_c_mentor');
            $table->unsignedInteger('id_c_assunto');
            $table->timestamp('dt_fim')->nullable();
            $table->timestamp('dt_finalizado')->nullable();
            $table->bigInteger('qnt_mensagens')->default(0);
            $table->integer('qnt_reconeccoes')->default(1);
            $table->tinyInteger('ds_status');
            $table->double('vl_nota', 2, 2)->default(0.0);
            $table->foreign('id_c_assunto')
                    ->references('id_assunto')
                    ->on('tb_assuntos')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('id_c_mentorado')
                    ->references('id_mentorado')
                    ->on('tb_mentorados')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('id_c_mentor')
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
        Schema::dropIfExists('conexaos');
    }
}
