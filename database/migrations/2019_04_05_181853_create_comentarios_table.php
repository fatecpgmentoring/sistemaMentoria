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
            $table->double('vl_nota', 2, 2)->default(0.0);
            $table->unsignedInteger('mentor_id_mentor');
            $table->unsignedInteger('mentorado_id_mentorado');
            $table->foreign('mentor_id_mentor')
                    ->references('id_mentor')
                    ->on('tb_mentores')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->foreign('mentorado_id_mentorado')
                    ->references('id_mentorado')
                    ->on('tb_mentorados')
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
        Schema::dropIfExists('tb_comentarios');
    }
}
