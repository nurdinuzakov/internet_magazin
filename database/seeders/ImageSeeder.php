<?php


namespace Database\Seeders;


use App\Models\Category;
use App\Models\Image;
use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    public function run()
    {
        $images = [
            '/images/product-details/1.jpg',
            '/images/product-details/new.jpg',
            '/images/product-details/similar1.jpg',
            '/images/product-details/similar2.jpg',
            '/images/product-details/similar3.jpg.jpg',

        ];

        $faker = Factory::create();

//        $products = DB::table('products')->select('id')->get()-;
//        $category = DB::table('category')->select('id')->get();
//        foreach ($images as $image){
//            Image::create([
//                'product_id' => $faker->randomElement($products),
//                'category_id' => $faker->randomElement($category_id),
//                'url' => $image,
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' => date('Y-m-d H:i:s')
//            ]);
//        }
    }
}
