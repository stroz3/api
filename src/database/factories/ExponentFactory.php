<?php

namespace Database\Factories;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'slug' => $this->faker->unique()->slug,
            'short_desc' => $this->faker->sentences(3, true),
            'meta_title' => $this->faker->word,
            'meta_keywords' => $this->faker->word,
            'meta_description' => $this->faker->word,
            'full_desc' => $this->faker->realText(2000),
            'logo_path' => $this->faker->imageUrl,
            'main_img_path' => $this->faker->imageUrl,
            'website_link' => $this->faker->url,
            'contacts' => [
                [
                    'type' => 'email',
                    'value' => $this->faker->email,
                ],
                [
                    'type' => 'phone',
                    'value' => $this->faker->phoneNumber,
                ],
            ],
            'inn' => $this->faker->unique()->numberBetween(100000000000, 900000000000),
            'kpp' => $this->faker->unique()->numberBetween(100000000, 900000000),
            'ogrn' => $this->faker->unique()->numberBetween(1000000000000, 9000000000000),
            'business_address' => $this->faker->address,
            'production_address' => $this->faker->address,
            'is_import_substitution' => $this->faker->boolean,
            'active' => $this->faker->boolean,
            'sector_id' => Sector::inRandomOrder()->value('id'),
            'user_id' => User::inRandomOrder()->value('id'),
        ];
    }
}
