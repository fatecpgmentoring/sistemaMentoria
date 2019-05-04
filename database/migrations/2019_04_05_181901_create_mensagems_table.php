<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mensagens', function (Blueprint $table) {
            $table->increments('id_mensagem');
            $table->text('ds_mensagem');
            $table->unsignedInteger('conexao_id_conexao');
            $table->boolean('ds_mensagem_vista')->default(0);
            $table->foreign('conexao_id_conexao')
                    ->references('id_conexao')
                    ->on('tb_conexoes')
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
        Schema::dropIfExists('mensagems');
    }
}
