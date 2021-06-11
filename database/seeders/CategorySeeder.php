<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Продукты питания',
                'description' => 'Основными продуктами питания является пища, представляющая собой доминирующую часть
                питания в данной популяции. Большинство людей питается весьма ограниченным количеством основных продуктов
                питания.[1]',
                'picture' => '{{ asset("images/home/food.png") }}',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            ['name' => 'Мыломоющие',
            'description' => 'Моющие средства',
            'picture' => '{{ asset("images/home/mylomoyushie.jpg") }}',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            ['name' => 'Одежда',
                'description' => '#',
                'picture' => '../images/home/odejda.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            ['name' => 'Электроника',
                'description' => '#',
                'picture' => '../images/home/electronika.jpeg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            ['name' => 'Детские товары',
                'description' => '#',
                'picture' => '../images/home/detskie_tovary.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            ['name' => 'Обувь',
                'description' => '#',
                'picture' => '../images/home/obuv.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]

        ];

        foreach ($categories as $category){
            DB::table('category')->insert([
                $category
            ]);
        }
    }
}
