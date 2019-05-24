<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
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
        	'email' => 'patrick@gmail.com',
        	'password' => bcrypt('patrick'),
        	'cd_role' => '3',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'janaina@gmail.com',
        	'password' => bcrypt('janaina'),
        	'cd_role' => '3',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'paulo@gmail.com',
        	'password' => bcrypt('paulo'),
        	'cd_role' => '3',
        	'cd_status' => '1',
        ]);

        DB::table('tb_usuarios')->insert([
        	'email' => 'andre@gmail.com',
        	'password' => bcrypt('andre'),
        	'cd_role' => '3',
        	'cd_status' => '1',
        ]);

    }
}
