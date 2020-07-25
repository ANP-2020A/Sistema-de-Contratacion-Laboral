<?php

use App\Oferta;
use Illuminate\Database\Seeder;

class OfertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla articles.
        Oferta::truncate();
        $faker = \Faker\Factory::create();
        // sesión con cada uno para crear Exp en su nombre

        for ($i = 0; $i < 15; $i++) {
            Oferta::create([
                'titulo_oferta' => $faker->text,
                'descripcion_oferta' => $faker->paragraph,
                'fecha_publicacion' => $faker->paragraph,

            ]);
        }
    }

}
