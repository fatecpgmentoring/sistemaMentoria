<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_assuntos', function (Blueprint $table) {
            $table->increments('id_assunto');
            $table->string('nm_assunto');
            $table->boolean('ds_active_assunto')->default(1);
            $table->string('assunto_log');
            $table->unsignedInteger('carreira_id_carreira');
            $table->foreign('carreira_id_carreira')
                    ->references('id_carreira')
                    ->on('tb_carreiras')
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
        Schema::dropIfExists('assuntos');
    }
}
