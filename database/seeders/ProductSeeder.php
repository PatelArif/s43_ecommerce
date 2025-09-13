<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categoryId    = Category::where('name', 'Eco-Friendly Bags')->first()->id;
        $subcategoryId = Subcategory::where('name', 'Cotton Bags')->first()->id;

        Product::create([
            'category_id'    => $categoryId,
            'subcategory_id' => $subcategoryId,
            'title'          => 'Reusable Cotton Tote Bag',
            'description'    => 'An eco-conscious, washable cotton tote bag perfect for groceries and everyday use.',
            'main_image'     => 'https://images.unsplash.com/photo-1593032465174-31d58eaa13b7?fit=crop&w=600&q=80',
            'image_1'        => 'https://images.unsplash.com/photo-1585386959984-a4155228f94b?fit=crop&w=600&q=80',
            'image_2'        => 'https://images.unsplash.com/photo-1585386858264-8576dfd81f0a?fit=crop&w=600&q=80',
            'image_3'        => 'https://images.unsplash.com/photo-1612204620172-9757c5766ce1?fit=crop&w=600&q=80',
            'image_4'        => 'https://images.unsplash.com/photo-1621323038991-68c24657f75e?fit=crop&w=600&q=80',
            'price'          => 299,
            'discount'       => 15,
            'height'         => 40,
            'width'          => 35,
            'handle'         => 'Yes',
            'base'           => 'Cotton',
        ]);
    }
}

// class ProductSeeder extends Seeder
// {
//     public function run(): void
//     {
//         $subcategories = Subcategory::all();

//         foreach ($subcategories as $subcat) {
//             for ($i = 1; $i <= 5; $i++) {
//                 Product::create([
//                     'category_id'    => $subcat->category_id,
//                     'subcategory_id' => $subcat->id,
//                     'title'          => 'Product ' . $i . ' in ' . $subcat->name,
//                     'description'    => 'This is a description for product ' . $i,
//                     'main_image'     => 'main.jpg',
//                     'image_1'        => '1.jpg',
//                     'image_2'        => '2.jpg',
//                     'image_3'        => '3.jpg',
//                     'image_4'        => '4.jpg',
//                     'price'          => rand(100, 500),
//                     'discount'       => rand(5, 20),
//                     'height'         => '18',
//                     'width'          => '19 1/2',
//                     'handle'         => '8',
//                     'base'           => '6 1/2',
//                 ]);
//             }
//         }
//     }
// }
// 
