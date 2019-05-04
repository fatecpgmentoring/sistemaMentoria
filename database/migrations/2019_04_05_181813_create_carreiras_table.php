<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_carreiras', function (Blueprint $table) {
            $table->increments('id_carreira');
            $table->string('nm_carreira');
            $table->boolean('ds_active_carreira')->default(1);
            $table->string('carreira_log');
            $table->unsignedInteger('profissao_id_profissao');
            $table->foreign('profissao_id_profissao')
                    ->references('id_profissao')
                    ->on('tb_profissoes')
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
        Schema::dropIfExists('carreiras');
    }
}
