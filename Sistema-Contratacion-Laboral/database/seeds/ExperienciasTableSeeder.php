<?php

use App\Experiencia;
use Illuminate\Database\Seeder;

class ExperienciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla articles.
        Experiencia::truncate();
        $faker = \Faker\Factory::create();
        // sesión con cada uno para crear Exp en su nombre

        for ($i = 0; $i < 15; $i++) {
            Experiencia::create([
                'nombre_empresa' => $faker->name,
                'area_trabajo' => $faker->text,
                'lugar_trabajo' => $faker->text,
                'fecha_inicio' => $faker->dateTime,
                'fecha_finalización' => $faker->dateTime,
            ]);
        }
    }
}
