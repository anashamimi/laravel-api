<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Faker\Provider\Image;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $faker->addProvider(new Image($faker));

        for ($i = 0; $i < 15; $i++) {
            $title = implode(' ', $faker->words(3));
            $description = implode("\n\n", $faker->paragraphs());
            $price = $faker->randomFloat(2, 5, 99);
            $image = $faker->imageUrl(300, 400, 'books', true);

            Product::create([
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'image' => $image,
            ]);
        }
    }
}

