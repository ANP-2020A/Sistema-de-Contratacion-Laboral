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
                'Descripciòn_de_estudios' => $faker->paragraph,
                'Fecha_inicio' => $faker->dateTime,
                'Fecha_Finalización' => $faker->dateTime,
            ]);
        }
    }
}
