<?php

namespace Database\Seeders;

use App\Models\Canton;
use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    public function run(): void
    {
        $cantons = [
            'Zürich'           => 55.00,
            'Bern'             => 50.00,
            'Luzern'           => 50.00,
            'Uri'              => 48.00,
            'Schwyz'           => 50.00,
            'Obwalden'         => 48.00,
            'Nidwalden'        => 48.00,
            'Glarus'           => 48.00,
            'Zug'              => 55.00,
            'Fribourg'         => 48.00,
            'Solothurn'        => 48.00,
            'Basel-Stadt'      => 55.00,
            'Basel-Landschaft' => 52.00,
            'Schaffhausen'     => 48.00,
            'Appenzell A.Rh.'  => 48.00,
            'Appenzell I.Rh.'  => 48.00,
            'St. Gallen'       => 50.00,
            'Graubünden'       => 50.00,
            'Aargau'           => 50.00,
            'Thurgau'          => 48.00,
            'Ticino'           => 48.00,
            'Vaud'             => 52.00,
            'Valais'           => 48.00,
            'Neuchâtel'        => 48.00,
            'Genève'           => 55.00,
            'Jura'             => 48.00,
        ];

        foreach ($cantons as $name => $price) {
            Canton::updateOrCreate(
                ['name' => $name],
                ['price_per_hour' => $price]
            );
        }
    }
}
