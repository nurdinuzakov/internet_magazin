<?php

namespace Database\Seeders;

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
        Products::factory()->count(1000)->create();

//        $faker = Factory::create();
//
//        for ($i = 0; $i < 20; $i++) {
//            Products::create([
//                'name' => $faker->name
//            ]);
//        }
    }
}
