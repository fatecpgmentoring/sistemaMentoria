<?php

use Illuminate\Database\Seeder;

class MentorDevTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuarios
        
        DB::table('tb_usuarios')->insert([
        	'email' => 'patrickmentor@gmail.com',
        	'password' => bcrypt('patrick'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'janainamentor@gmail.com',
        	'password' => bcrypt('janaina'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'paulomentor@gmail.com',
        	'password' => bcrypt('paulo'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'andrementor@gmail.com',
        	'password' => bcrypt('andre'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        //Mentores
        
        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Patrick',
        	'nv_conhecimento' => '7',
        	'vl_nota' => '10.0',
        	'ds_foto' => 'misterm.png',
        	'usuario_id_usuario' => '11',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Janaina',
        	'nv_conhecimento' => '7',
        	'vl_nota' => '10.0',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '12',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Paulo',
        	'nv_conhecimento' => '7',
        	'vl_nota' => '10.0',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '13',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Andre',
        	'nv_conhecimento' => '7',
        	'vl_nota' => '10.0',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '14',
        ]);

    }
}
