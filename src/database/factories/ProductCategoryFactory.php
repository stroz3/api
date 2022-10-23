<?php

namespace Database\Factories;

use App\Enum\VerificationStatus;
use App\Models\Exponent;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'parent_id' => !random_int(0, 3) ? ProductCategory::inRandomOrder()->value('id') : null,
            'verification_status' => $this->faker->randomElement([VerificationStatus::ON_VERIFICATION, VerificationStatus::APPROVED, VerificationStatus::REJECTED]),
            'verification_comment' => !random_int(0, 3) ? $this->faker->sentences(2, true) : null,
            'active' => $this->faker->boolean,
            'exponent_id' => Exponent::inRandomOrder()->value('id'),
            'published_at' => random_int(0, 1) ? $this->faker->dateTime : null,
        ];
    }
}
