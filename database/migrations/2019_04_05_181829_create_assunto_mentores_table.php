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
        Schema::create('tb_assunto_mentores', function (Blueprint $table) {
            $table->increments('id_assunto_mentor');
            $table->unsignedInteger('id_am_mentor');
            $table->unsignedInteger('id_am_assunto');
            $table->foreign('id_am_mentor')
                    ->references('id_mentor')
                    ->on('tb_mentores')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
            $table->foreign('id_am_assunto')
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
        Schema::dropIfExists('assunto_mentores');
    }
}
