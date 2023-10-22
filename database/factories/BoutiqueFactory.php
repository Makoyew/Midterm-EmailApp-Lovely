<?php

namespace Database\Factories;

use App\Models\Boutique;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boutique>
 */
class BoutiqueFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->words(2, true), // Random flower name
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 5, 100), // Random price between 5 and 100
        ];
    }
}
