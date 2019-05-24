<?php

use Illuminate\Database\Seeder;

class ProfissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_profissoes')->insert([
        	'nm_profissao' => 'Analista de Sistemas',
        	'ds_active_profissao' => '1',
        	'profissao_log' => 'Alguma coisa',
        ]);

        DB::table('tb_profissoes')->insert([
        	'nm_profissao' => 'Arquiteto de Software',
        	'ds_active_profissao' => '1',
        	'profissao_log' => 'Alguma coisa',
        ]);

        DB::table('tb_profissoes')->insert([
        	'nm_profissao' => 'Programador',
        	'ds_active_profissao' => '1',
        	'profissao_log' => 'Alguma coisa',
        ]);

        DB::table('tb_profissoes')->insert([
        	'nm_profissao' => 'Gerente de Sistemas',
        	'ds_active_profissao' => '1',
        	'profissao_log' => 'Alguma coisa',
        ]);

        DB::table('tb_profissoes')->insert([
        	'nm_profissao' => 'Desenvolvedor',
        	'ds_active_profissao' => '1',
        	'profissao_log' => 'Alguma coisa',
        ]);

        DB::table('tb_profissoes')->insert([
        	'nm_profissao' => 'Tester',
        	'ds_active_profissao' => '1',
        	'profissao_log' => 'Alguma coisa',
        ]);
    }
}
