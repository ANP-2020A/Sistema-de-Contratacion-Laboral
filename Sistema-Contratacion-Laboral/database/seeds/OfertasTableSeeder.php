<?php

use App\AreaTrabajo;
use App\Empresa;
use App\Oferta;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        oferta::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear ofertas en su nombre
        $users = \App\User::all();
        $areas = AreaTrabajo::all();
        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            if ($user->role == 'ROLE_EMPRESA') {
                JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

                // Y ahora con este usuario creamos algunas ofertas
                foreach ($areas as $area) {
                    oferta::create([
                        'titulo_oferta' => $faker->sentence,
                        'descripcion_oferta' => $faker->paragraph,
                        'fecha_publicacion' => $faker->date('y-m-d'),
                        'link_google_forms' => $faker->url,
                        'area_id' => $area->id,
                        'empresa_id'=>$faker->numberBetween(1,5),
                        'image' => $faker->imageUrl(400, 300, null, true),
                    ]);
                }
            }
        }
    }

}
