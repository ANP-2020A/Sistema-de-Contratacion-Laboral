<?php

use App\AreaTrabajo;
use Illuminate\Database\Seeder;

class AreaTrabajosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        AreaTrabajo::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 10; $i++) {
            AreaTrabajo::create([
                'area_trabajo' => $faker->text,
            ]);
        }
    }
}
