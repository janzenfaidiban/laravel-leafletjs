<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Centre_Point;

class CentrePointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // item
        Centre_Point::create([
            'coordinates' => '-3.3818237353282767,138.51562500000003',
        ]);
    }
}
