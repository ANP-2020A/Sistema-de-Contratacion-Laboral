<?php

use App\Oferta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(ExperienciasTableSeeder::class);
        $this->call(EstudiosTableSeeder::class);
        $this->call(AreaTrabajosTableSeeder::class);
        $this->call(OfertasTableSeeder::class);
        schema::enableForeignKeyConstraints();
    }
}


