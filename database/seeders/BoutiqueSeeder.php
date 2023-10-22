<?php

namespace Database\Seeders;

use App\Models\Boutique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoutiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Boutique::factory()->count(10)->create();
    }
}
