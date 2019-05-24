<?php

use Illuminate\Database\Seeder;

class MentorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Patrick',
        	'nv_conhecimento' => '5',
        	'vl_nota' => '6.0',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '1',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Marola',
        	'nv_conhecimento' => '4',
        	'vl_nota' => '5.6',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '2',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Ricard',
        	'nv_conhecimento' => '5',
        	'vl_nota' => '6.0',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '3',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Parlani',
        	'nv_conhecimento' => '5',
        	'vl_nota' => '6.0',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '4',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Beruska',
        	'nv_conhecimento' => '7',
        	'vl_nota' => '6.0',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '5',
        ]);

        DB::table('tb_mentores')->insert([
        	'nm_mentor' => 'Risoto',
        	'nv_conhecimento' => '7',
        	'vl_nota' => '6.6',
        	'ds_foto' => 'avatar.png',
        	'usuario_id_usuario' => '6',
        ]);
    }
}
