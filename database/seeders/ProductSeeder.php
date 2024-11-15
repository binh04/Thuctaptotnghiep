<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sanPhamNam = [
            'Giày Nike Air Zoom Obito',
            'Giày Asics Obito',
            'Giày Lacoste Nam Obito',
            'Giày Adidas Obito',
            'Giày Nike Air Zoom Obito',
            'Giày Adidas Obito',
            'Giày Lacoste Nam Obito',
            'Giày Nike Air Zoom Obito',
            'Giày Adidas Obito',
            'Giày Nike Air Zoom Obito',
            'Giày Lacoste Nam Obito',
            'Giày Asics Obito',
            'Giày Adidas Obito',
            'Giày Lacoste Nam Obito',
            'Giày Nike Air Zoom Obito',
        ];

        $sanPhamNu = [
           'Giày Nike Air Zoom Obito',
            'Giày Asics Obito',
            'Giày Lacoste Nam Obito',
            'Giày Adidas Obito',
            'Giày Nike Air Zoom Obito',
            'Giày Adidas Obito',
            'Giày Lacoste Nam Obito',
            'Giày Nike Air Zoom Obito',
            'Giày Adidas Obito',
            'Giày Nike Air Zoom Obito',
            'Giày Lacoste Nam Obito',
            'Giày Asics Obito',
            'Giày Adidas Obito',
            'Giày Lacoste Nam Obito',
            'Giày Nike Air Zoom Obito',
        ];

        $categoryIds = Category::pluck('id')->toArray();

        $categoryType = Category::pluck('type', 'id')->toArray();

        foreach ($sanPhamNam as $nam) {
            $price = rand(100000, 9000000);
            $sale = round($price * 0.6, 3); // Giảm 40%
            $category = $categoryIds[array_rand($categoryIds)];
            $type = $categoryType[$category];
            if ($type == "Man") {
                Product::create([
                    'category_id'   => $category,
                    'image'         => '/assets/client/images/content/products/product-' . rand(1, 8) . '.jpg',
                    'name'          => $nam,
                    'SKU'           => "OB" . Str::random(3) . rand(10000, 99999),
                    'base_stock' => 50,
                    'price_regular' => $price,
                    'price_sale'    => $sale,
                    'base_stock'    => rand(0, 500),
                    'description'   => fake()->text(200),
                    'views'         => rand(1, 100),
                    'content'       => fake()->text(400),
                ]);
            }
        }

        foreach ($sanPhamNu as $nu) {
            $price = rand(100000, 9000000);
            $sale = round($price * 0.5, 3);
            $category = $categoryIds[array_rand($categoryIds)];
            $type = $categoryType[$category];
            if ($type == "Woman") {
                Product::create([
                    'category_id'   => $category,
                    'image'         => '/assets/client/images/content/products/product-' . rand(9, 17) . '.jpg',
                    'name'          => $nu,
                    'SKU'           => "OB" . Str::random(3) . rand(10000, 99999),
                    'base_stock' => 50,
                    'price_regular' => $price,
                    'price_sale'    => $sale,
                    'base_stock'    => rand(0, 500),
                    'description'   => fake()->text(200),
                    'views'         => rand(1, 100),
                    'content'       => fake()->text(400),
                ]);
            }
        }
    }
}
