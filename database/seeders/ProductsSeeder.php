<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Database\Factories\ProductsFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            '/images/electronic-products/iphone12.jpg',
            '/images/home/mylomoyushie.jpg',
            '/images/food-products/frima.jpg',
            '/images/electronic-products/poco.jpg'
        ];
        $faker = Factory::create();

        $category_ids = Subcategory::pluck('id');

        for ($i = 0; $i < 50; $i++) {
            Products::create([
                'name' => $faker->name(),
                'description' => $faker->text(),
                'subcategory_id' => $faker->randomElement($category_ids),
                'quantity' => $faker->numberBetween(1, 10),
                'price' => $faker->numberBetween(100, 600),
                'images' => $faker->randomElement($images),
            ]);
        }
    }
}
