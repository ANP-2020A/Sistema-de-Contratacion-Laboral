<?php

use App\Empresa;
use App\Postulante;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        User::truncate();
        $faker = \Faker\Factory::create();
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123123');
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@prueba.com',
            'password' => $password,
            'userable_id' => 0,
            'userable_type' => 'App\Admin',
            'role'=>User::ROLE_SUPERADMIN
        ]);
        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 5; $i++) {
            $Postulante = Postulante::create(
                [
                    'nombre'=> $faker->name,
                    'apellido'=> $faker->lastName,
                    'cedula'=> $faker->creditCardNumber,
                    'celular'=> $faker->phoneNumber,
                    'provincia'=> $faker->state,
                    'genero'=> $faker->firstName,
                    'nacionalidad'=> $faker->country
                ]);
            $Empresa = Empresa::create(
                [
                    'empresa'=> $faker->company,
                    'ruc_cedula'=> $faker->creditCardNumber,
                    'celular'=> $faker->phoneNumber,
                    'sector'=> $faker->address,
                    'ubicacion'=> $faker->secondaryAddress,
                    'actividad'=> $faker->jobTitle
                ]);
            $Postulante->user()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'role' => 'ROLE_POSTULANTE'
            ]);
            $Empresa->user()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'role' => 'ROLE_EMPRESA'
            ]);
        }
    }
}
