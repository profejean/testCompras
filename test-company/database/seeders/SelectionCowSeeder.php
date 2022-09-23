<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SelectionCow;

class SelectionCowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SelectionCow::create([
            'peso'           => 360,
            'produccion'        => 40,
        ]);
        SelectionCow::create([
            'peso'           => 250,
            'produccion'        => 35,
        ]);
        SelectionCow::create([
            'peso'           => 400,
            'produccion'        => 43,
        ]);
        SelectionCow::create([
            'peso'           => 180,
            'produccion'        => 28,
        ]);
        SelectionCow::create([
            'peso'           => 50,
            'produccion'        => 12,
        ]);
        SelectionCow::create([
            'peso'           => 90,
            'produccion'        => 13,
        ]);
    }
}
