<?php

namespace Database\Factories;

use App\Models\Exponent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->sentences(6, true),
            'eval' => $this->faker->numberBetween(1, 5),
            'author_name' => $this->faker->name,
            'author_company' => $this->faker->company,
            'img_path' => $this->faker->imageUrl,
            'exponent_id' => Exponent::inRandomOrder()->value('id'),
        ];
    }
}
