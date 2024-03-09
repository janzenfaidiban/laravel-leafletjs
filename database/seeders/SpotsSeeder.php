<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spot;

class SpotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // item
        Spot::create([
            'name' => 'Kabupaten Keerom',
            'slug' => 'kabupaten-keerom',
            'coordinates' => '-3.343,140.663',
            'description' => 'Map marker Kabupaten Keerom',
            'image' => 'logo-keerom.png',
        ]);

        // item
        Spot::create([
            'name' => 'Kabupaten Jayapura',
            'slug' => 'kabupaten-jayapura',
            'coordinates' => '-3.053,139.960',
            'description' => 'Map marker Kabupaten Jayapura',
            'image' => 'logo-kabupaten-jayapura.png',
        ]);

        // item
        Spot::create([
            'name' => 'Kota Jayapura',
            'slug' => 'kota-jayapura',
            'coordinates' => '-2.5535,140.6607',
            'description' => 'Map marker Kota Jayapura',
            'image' => 'logo-kota-jayapura.png',
        ]);

        // item
        Spot::create([
            'name' => 'Kabupaten Sarmi',
            'slug' => 'kabupaten-sarmi',
            'coordinates' => '-2.575,139.103',
            'description' => 'Map marker Kabupaten Sarmi',
            'image' => 'logo-kabupaten-sarmi.png',
        ]);

        // item
        Spot::create([
            'name' => 'Kabupaten Mamberamo Raya',
            'slug' => 'kabupaten-mamberamo-raya',
            'coordinates' => '-2.433,137.829',
            'description' => 'Map marker Kabupaten Mamberamo Raya',
            'image' => 'logo-kabupaten-mamberamo-raya.png',
        ]);

        // item
        Spot::create([
            'name' => 'Kabupaten Kepulauan Yapen',
            'slug' => 'kabupaten-kepulauan-yapen',
            'coordinates' => '-1.779,136.357',
            'description' => 'Map marker Kabupaten Kepulauan Yapen',
            'image' => 'logo-kabupaten-kepulauan-yapen.png',
        ]);

        // item
        Spot::create([
            'name' => 'Kabupaten Biak Numfor',
            'slug' => 'kabupaten-biak-numfor',
            'coordinates' => '-1.027,136.044',
            'description' => 'Map marker Kabupaten Biak Numfor',
            'image' => 'logo-kabupaten-biak-numfor.png',
        ]);
    }
}
