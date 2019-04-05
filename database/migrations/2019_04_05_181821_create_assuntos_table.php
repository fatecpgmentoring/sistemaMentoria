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
        Schema::create('assuntos', function (Blueprint $table) {
            $table->increments('id_assunto');
            $table->string('nm_assunto');
            $table->boolean('ds_active_assunto')->default(1);
            $table->string('ds_log');
            $table->unsignedInteger('id_assunto_carreira');
            $table->foreign('id_assunto_carreira')
                    ->references('id_carreira')
                    ->on('carreiras')
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
