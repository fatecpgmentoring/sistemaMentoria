<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_inscritos', function (Blueprint $table) {
            $table->increments('id_inscrito');
            $table->string('nm_inscrito');
            $table->string('cd_cpf');
            $table->string('cd_rg');
            $table->string('cd_cep');
            $table->string('nm_email');
            $table->string('ds_endereco');
            $table->string('nm_estado');
            $table->date('dt_nascimento');
            $table->tinyInteger('ds_status_pagamento')->default(0);
            $table->unsignedInteger('evento_id_evento');
            $table->foreign('evento_id_evento')
                    ->references('id_evento')
                    ->on('tb_eventos')
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
        Schema::dropIfExists('tb_inscritos');
    }
}
