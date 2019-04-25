<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_eventos', function (Blueprint $table) {
            $table->increments('id_evento');
            $table->string('nm_titulo');
            $table->string('ds_local');
            $table->string('ds_assuntos');
            $table->text('ds_evento');
            $table->date('dt_inicio');
            $table->date('dt_fim');
            $table->time('hr_inicio');
            $table->time('hr_fim');
            $table->integer('qnt_max_inscritos');
            $table->integer('qnt_inscritos');
            $table->double('vl_inscricao', 5, 2);
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
        Schema::dropIfExists('eventos');
    }
}
