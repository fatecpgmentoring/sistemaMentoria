<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('email', 100)->unique();
            $table->string('passoword');
            $table->tinyInteger('cd_role', 1)->default(1); // 1 - Mentorado 2 - Mentor 3 - Admin 4 - Dev (só nós)
            $table->unsignedInteger('id_vinculo');
            $table->boolean('cd_status')->default(1);
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
        Schema::dropIfExists('usuarios');
    }
}
