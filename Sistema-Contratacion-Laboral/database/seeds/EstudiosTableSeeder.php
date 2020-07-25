<?php

use App\Estudio;
use Illuminate\Database\Seeder;

class EstudiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Estudio::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Estudio::create([
                'institucion' => $faker->text,
                'nivel' => $faker->text,
                'nivel_ingles' => $faker->text,
                'fecha_inicio' => $faker->dateTime,
                'fecha_finalización' => $faker->dateTime,
            ]);
        }
    }
}
