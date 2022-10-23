<?php

namespace Database\Seeders;

use App\Models\Exponent;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Review;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedModel(User::factory(), 50, 'User');
        $this->seedModel(Sector::factory(), 20, 'Sector');
        $this->seedModel(Exponent::factory(), 60, 'Exponent');
        $this->seedModel(Review::factory(), 200, 'Review');
        $this->seedModel(ProductCategory::factory(), 100, 'ProductCategory');
        $this->seedModel(Product::factory(), 500, 'Product');
    }

    protected function seedModel(Factory $modelFactory, int $objectsCount, ?string $modelName)
    {
        $output = $this->command->getOutput();
        if (!is_null($modelName)) {
            $output->text("[$modelName] model objects creating...");
            $output->newLine();
        }
        $output->progressStart($objectsCount);
        for ($i = 0; $i < $objectsCount; $i++) {
            $modelFactory->create();
            $output->progressAdvance();
        }
        $output->progressFinish();
        $output->newLine();
    }
}
