<?php

use Illuminate\Database\Seeder;

class MentoradoDevTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        
    	DB::table('tb_usuarios')->insert([
        	'email' => 'patrickmentorado@gmail.com',
        	'password' => bcrypt('patrick'),
        	'cd_role' => '1',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'janainamentorado@gmail.com',
        	'password' => bcrypt('janaina'),
        	'cd_role' => '1',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'paulomentorado@gmail.com',
        	'password' => bcrypt('paulo'),
        	'cd_role' => '1',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'andrementorado@gmail.com',
        	'password' => bcrypt('andre'),
        	'cd_role' => '1',
        	'cd_status' => '1',
        ]);

        
        //Mentorados
        
        DB::table('tb_mentorados')->insert([
        	'nm_mentorado' => 'Patrick de Lima',
        	'ds_foto' => 'misterm.png',
        	'usuario_id_usuario' => '7',
        ]);

        DB::table('tb_mentorados')->insert([
        	'nm_mentorado' => 'Janaina Dias',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '8',
        ]);

        DB::table('tb_mentorados')->insert([
        	'nm_mentorado' => 'Paulo Henrique',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '9',
        ]);

        DB::table('tb_mentorados')->insert([
        	'nm_mentorado' => 'Andre Luiz',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '10',
        ]);
    }
}
