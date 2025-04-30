<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Ecofriendly Bags',
            'Handmade Accessories',
            'Reusable Bottles',
            'Sustainable Decor',
            'Organic Clothing',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name'  => $name,
                'image' => 'default.jpg',
            ]);
        }
    }
}
