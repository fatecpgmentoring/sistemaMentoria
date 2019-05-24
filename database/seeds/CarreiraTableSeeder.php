<?php

use Illuminate\Database\Seeder;

class CarreiraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Analista de Planejamento',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '1'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Analista de Execução',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '1'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Analista de Nuvem de Dados',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '1'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Arquiteto de Framework',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '2'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Arquiteto de Sistemas Móveis',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '2'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Arquiteto de Banco de Dados',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '2'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Programador Junior',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '3'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Programador Senior',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '3'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Programador Pika das Galáxias',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '3'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Gerente de Sistemas 1',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '4'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Gerente de Sistemas 2',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '4'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Gerente de Sistemas 3',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '4'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Desenvolvedor 1',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '5'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Desenvolvedor 2',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '5'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Desenvolvedor 3',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '5'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Tester 1',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '6'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Tester 2',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '6'
        ]);

        DB::table('tb_carreiras')->insert([
        	'nm_carreira' => 'Tester 3',
        	'ds_active_carreira' => '1',
        	'carreira_log' => 'Alguma coisa',
        	'profissao_id_profissao' => '6'
        ]);
    }
}
