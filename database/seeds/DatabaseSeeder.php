<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([

         	UsuarioTableSeeder::class,
            MentorTableSeeder::class,
            ProfissaoTableSeeder::class,
            CarreiraTableSeeder::class,
         	AssuntoTableSeeder::class,
            MentoradoDevTableSeeder::class,
            MentorDevTableSeeder::class,
            AdminTableSeeder::class,
            
         ]);
    }
}
