<?php

use App\Experiencia;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear artículos en su nombre
        $users = App\User::all();
        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);
            // Y ahora con este usuario creamos algunos articulos
            $num_experiencias = 3;
            for ($j = 0; $j < $num_experiencias; $j++) {
                Experiencia::create([
                    'nombre_empresa' => $faker->company,
                    'area_trabajo' => $faker->streetName,
                    'lugar_trabajo' => $faker->address,
                    'fecha_inicio' => $faker->date('y-m-d'),
                    'fecha_finalización' => $faker->date('y-m-d'),
                ]);
            }
        }
    }
}
