<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mentores', function (Blueprint $table) {
            $table->increments('id_mentor');
            $table->string('nm_mentor', 100);
            $table->integer('nv_conhecimento')->default(1);
            $table->double('vl_nota', 2, 2)->default(5.0);
            $table->unsignedInteger('usuario_id_usuario');
            $table->foreign('usuario_id_usuario')
                    ->references('id_usuario')
                    ->on('tb_usuarios')
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
        //
    }
}
