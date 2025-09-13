<?php
namespace Database\Seeders;

// use App\Models\Category;
// use Illuminate\Database\Seeder;

// class CategorySeeder extends Seeder
// {
//     public function run(): void
//     {
//         $categories = [
//             'Ecofriendly Bags',
//             'Handmade Accessories',
//             'Reusable Bottles',
//             'Sustainable Decor',
//             'Organic Clothing',
//         ];

//         foreach ($categories as $name) {
//             Category::create([
//                 'name'  => $name,
//                 'image' => 'default.jpg',
//             ]);
//         }
//     }
// }
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            [
                'name'  => 'Eco-Friendly Bags',
                'image' => 'https://images.unsplash.com/photo-1585386959984-a4155228f94b?fit=crop&w=600&q=80',
            ],
        ]);
    }
}
