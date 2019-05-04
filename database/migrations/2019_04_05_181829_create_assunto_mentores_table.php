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
            $table->unsignedInteger('mentor_id_mentor');
            $table->unsignedInteger('assunto_id_assunto');
            $table->foreign('mentor_id_mentor')
                    ->references('id_mentor')
                    ->on('tb_mentores')
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
        Schema::dropIfExists('assunto_mentores');
    }
}
