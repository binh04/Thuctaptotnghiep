<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $woman = [
            'Giày thể thao',
            'Giày đá bóng',
            'Giày gat shoes',
            'Giày lười',
            'Giày adidas',
        ];

        $man = [
           'Giày thể thao',
            'Giày đá bóng',
            'Giày gat shoes',
            'Giày lười',
            'Giày adidas',
            'Giày cao gót'
        ];

        foreach ($man as $item) {
            Category::create([
                'name' => $item,
                'type' => 'Man',
            ]);
        }

        foreach ($woman as $item) {
            Category::create([
                'name' => $item,
                'type' => 'Woman',
            ]);
        }
    }
}
