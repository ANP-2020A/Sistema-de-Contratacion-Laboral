<?php

use App\Oferta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ExperienciasTableSeeder::class);
        $this->call(EstudiosTableSeeder::class);
        $this->call(OfertasTableSeeder::class);
    }
}


