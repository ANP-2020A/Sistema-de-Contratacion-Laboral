<?php

use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserPostOfertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // Obtenemos todos las ofertas de empleo
        $ofertas = App\Oferta::all();
        // Obtenemos todos los usuarios
        $users = App\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con cada uno
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Creamos un comentario para cada artículo con este usuario
            foreach ($ofertas as $oferta) {
                Comment::create([
                    'oferta_id' => $article->id,
                ]);
            }
        }
    }
}
