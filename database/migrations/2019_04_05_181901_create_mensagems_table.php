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
        Schema::create('mensagens', function (Blueprint $table) {
            $table->increments('id_mensagem');
            $table->text('ds_mensagem');
            $table->unsignedInteger('fk_mensagem_conexao');
            $table->boolean('ds_mensagem_vista')->default(0);
            $table->foreign('fk_mensagem_conxao')
                    ->references('id_conexao')
                    ->on('conexoes')
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
