<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_usuarios')->insert([
        	'email' => 'patruska@gmail.com',
        	'password' => bcrypt('patrick'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'marola@gmail.com',
        	'password' => bcrypt('marola'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'ricard@gmail.com',
        	'password' => bcrypt('ricard'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'parlani@gmail.com',
        	'password' => bcrypt('parlani'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'beruska@gmail.com',
        	'password' => bcrypt('beruska'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'risoto@gmail.com',
        	'password' => bcrypt('risoto'),
        	'cd_role' => '2',
        	'cd_status' => '1',
        ]);
    }
}
