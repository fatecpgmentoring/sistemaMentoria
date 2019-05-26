<?php

use Illuminate\Database\Seeder;

class AssuntoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 1 AP',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '1'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 2 AP',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '1'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 3 AP',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '1'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 4 AP',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '1'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 5 AP',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '1'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 1 AE',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '2'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 2 AE',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '2'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 3 AE',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '2'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 4 AE',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '2'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 5 AE',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '2'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 1 AND',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '3'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 2 AND',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '3'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 3 AND',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '3'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 4 AND',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '3'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 5 AND',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '3'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 1 AqF',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '4'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 2 AqF',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '4'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 3 AqF',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '4'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 4 AqF',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '4'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 5 AqF',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '4'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 1 AqSM',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '5'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 2 AqSM',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '5'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 3 AqSM',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '5'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 4 AqSM',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '5'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 5 AqSM',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '5'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 1 AqBD',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '6'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 2 AqBD',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '6'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 3 AqBD',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '6'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 4 AqBD',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '6'
        ]);

        DB::table('tb_assuntos')->insert([
        	'nm_assunto' => 'Assunto 5 AqBD',
        	'ds_active_assunto' => '1',
        	'assunto_log' => 'Alguma coisa',
        	'carreira_id_carreira' => '6'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 PJ',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '7'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 PJ',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '7'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 PJ',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '7'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 PJ',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '7'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 PJ',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '7'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 PS',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '8'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 PS',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '8'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 PS',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '8'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 PS',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '8'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 PS',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '8'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 PK',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '9'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 PK',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '9'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 PK',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '9'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 PK',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '9'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 PK',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '9'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 GS1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '10'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 GS1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '10'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 GS1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '10'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 GS1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '10'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 GS1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '10'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 GS2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '11'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 GS2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '11'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 GS2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '11'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 GS2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '11'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 GS2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '11'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 GS3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '12'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 GS3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '12'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 GS3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '12'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 GS3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '12'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 GS3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '12'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 DEV1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '13'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 DEV1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '13'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 DEV1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '13'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 DEV1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '13'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 DEV1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '13'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 DEV2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '14'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 DEV2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '14'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 DEV2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '14'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 DEV2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '14'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 DEV2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '14'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 DEV3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '15'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 DEV3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '15'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 DEV3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '15'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 DEV3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '15'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 DEV3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '15'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 TEST1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '16'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 TEST1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '16'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 TEST1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '16'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 TEST1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '16'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 TEST1',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '16'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 TEST2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '17'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 TEST2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '17'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 TEST2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '17'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 TEST2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '17'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 TEST2',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '17'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 1 TEST3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '18'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 2 TEST3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '18'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 3 TEST3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '18'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 4 TEST3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '18'
        ]);

        DB::table('tb_assuntos')->insert([
            'nm_assunto' => 'Assunto 5 TEST3',
            'ds_active_assunto' => '1',
            'assunto_log' => 'Alguma coisa',
            'carreira_id_carreira' => '18'
        ]);
    }
}
