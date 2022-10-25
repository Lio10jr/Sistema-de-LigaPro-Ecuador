<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Login;
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
        // \App\Models\User::factory(10)->create();

        $login = new Login();

        $login->nom_user = "PiriRex";
        $login->nombre = "Xavier";
        $login->apellido = "Cabrera";
        $login->fecha_nacimiento = "20-08-2001";
        $login->clave = "pirex2022";
        $login->email = "cabrera08@gmail.com";

    }
}
