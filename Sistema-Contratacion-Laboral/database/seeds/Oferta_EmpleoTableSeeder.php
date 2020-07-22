<?php

use App\Oferta_Empleo;
use Illuminate\Database\Seeder;

class Oferta_EmpleoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla articles.
        Oferta_Empleo::truncate();
        $faker = \Faker\Factory::create();
        // sesión con cada uno para crear Exp en su nombre

        for ($i = 0; $i < 15; $i++) {
            Oferta_Empleo::create([
                'Descripcion' => $faker->text,
                'Vacantes' => $faker->numberBetween(1,24)
            ]);
        }
    }
}
