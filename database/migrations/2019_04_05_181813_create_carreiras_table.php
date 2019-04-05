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
        Schema::create('carreiras', function (Blueprint $table) {
            $table->increments('id_carreira');
            $table->string('nm_carreira');
            $table->boolean('ds_active_carreira')->default(1);
            $table->string('ds_log');
            $table->unsignedInteger('id_carreira_profissao');
            $table->foreign('id_carreira_profissao')
                    ->references('id_profissao')
                    ->on('profissoes')
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
