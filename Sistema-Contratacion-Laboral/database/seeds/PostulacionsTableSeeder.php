<?php

use App\Postulacion;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostulacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciamos la tabla comments
        Postulacion::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos todos las ofertas de la bdd
        $ofertas = App\Oferta::all();
        // Obtenemos todos los usuarios
        $users = App\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con cada uno
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Creamos un postulacion con comentario para cada oferta con este usuario
            foreach ($ofertas as $oferta) {
                Postulacion::create([
                    'comentario' => $faker->paragraph,
                    'fecha_postulacion'=>$faker->date('y-m-d'),
                    'oferta_id' => $oferta->id,
                ]);
            }
        }
    }
}
