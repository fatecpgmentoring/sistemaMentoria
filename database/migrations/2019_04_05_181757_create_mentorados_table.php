<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentoradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mentorados', function (Blueprint $table) {
            $table->increments('id_mentorado');
            $table->string('nm_mentorado', 100);
            $table->timestamps();
        });

        DB::statement("ALTER TABLE mentorados AUTO_INCREMENT = 10000;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentorados');
    }
}
