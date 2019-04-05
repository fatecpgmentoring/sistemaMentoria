<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuntoMentoradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assunto_mentorados', function (Blueprint $table) {
            $table->increments('id_assunto_mentorado');
            $table->unsignedInteger('id_am_mentorado');
            $table->unsignedInteger('id_am_assunto');
            $table->foreign('id_am_mentorado')
                    ->references('id_mentorado')
                    ->on('mentorado')
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
        Schema::dropIfExists('assunto_mentorados');
    }
}
