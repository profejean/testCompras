<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre'           => 'Producto 1',
            'precio'           => 123.45,
            'tax'           => 5
        ]);

        Producto::create([
            'nombre'           => 'Producto 2',
            'precio'           => 45.65,
            'tax'           => 15
        ]);

        Producto::create([
            'nombre'           => 'Producto 3',
            'precio'           => 39.73,
            'tax'           => 12
        ]);

        Producto::create([
            'nombre'           => 'Producto 4',
            'precio'           => 250.00,
            'tax'           => 8
        ]);

        Producto::create([
            'nombre'           => 'Producto 5',
            'precio'           => 59.35,
            'tax'           => 10
        ]);
    }
}
