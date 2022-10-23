<?php

namespace Database\Factories;

use App\Enum\VerificationStatus;
use App\Models\Exponent;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

class ProductFactory extends Factory
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
            'slug' => $this->faker->unique()->slug,
            'brand' => $this->faker->company,
            'video_path' => null,
            'desc' => $this->faker->sentences(7, true),
            'price' => random_int(0, 1) ? $this->faker->numberBetween(100, 50000) : null,
            'meta_title' => $this->faker->word,
            'meta_keywords' => $this->faker->word,
            'meta_description' => $this->faker->word,
            'min_batch' => $this->faker->numberBetween(1, 1000) . ' шт.',
            'payment_method' => $this->faker->sentence,
            'delivery_method' => $this->faker->sentence,
            'in_bulk' => $this->faker->boolean,
            'retail' => $this->faker->boolean,
            'is_import_substitution' => $this->faker->boolean,
            'is_service' => $this->faker->boolean,
            'verification_status' => $this->faker->randomElement([VerificationStatus::ON_VERIFICATION, VerificationStatus::APPROVED, VerificationStatus::REJECTED]),
            'verification_comment' => !random_int(0, 3) ? $this->faker->sentences(2, true) : null,
            'active' => $this->faker->boolean,
            'exponent_id' => Exponent::inRandomOrder()->value('id'),
            'product_category_id' => ProductCategory::inRandomOrder()->value('id'),
            'published_at' => random_int(0, 1) ? $this->faker->dateTime : null,
        ];
    }
}
