<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // item
        User::create([
            'name' => 'Janzen Faidiban',
            'email' => 'janzenfaidiban@gmail.com',
            'password' => bcrypt('janzenfaidiban@gmail.com'),
        ]);
    }
}
