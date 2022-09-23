<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'Administrador',
            'email'           => 'administrador@gmail.com',
            'rol'           => 'admin',
            'password'        => bcrypt('password')

        ]);

        User::create([

            'name'           => 'Cliente 1',
            'email'           => 'cliente1@gmail.com',
            'rol'           => 'cliente',
            'password'        => bcrypt('password'),

        ]);

        User::create([

            'name'           => 'Cliente 2',
            'email'           => 'cliente2@gmail.com',
            'rol'           => 'cliente',
            'password'        => bcrypt('password'),

        ]);





    }
}
