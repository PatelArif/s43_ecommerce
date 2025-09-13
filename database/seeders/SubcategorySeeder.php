<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    public function run()
    {
        $categoryId = Category::where('name', 'Eco-Friendly Bags')->first()->id;

        Subcategory::insert([
            [
                'category_id' => $categoryId,
                'name'        => 'Jute Bags',
                'image'       => 'https://images.unsplash.com/photo-1621323038991-68c24657f75e?fit=crop&w=600&q=80',
            ],
            [
                'category_id' => $categoryId,
                'name'        => 'Cotton Bags',
                'image'       => 'https://images.unsplash.com/photo-1585386959984-a4155228f94b?fit=crop&w=600&q=80',
            ],
        ]);
    }
}


// class SubcategorySeeder extends Seeder
// {
//     public function run(): void
//     {
//         $categories  = Category::all();
//         $subcatCount = 0;

//         foreach ($categories as $category) {
//             for ($i = 1; $i <= 6; $i++) {
//                 Subcategory::create([
//                     'category_id' => $category->id,
//                     'name'        => $category->name . ' Subcategory ' . $i,
//                     'image'       => 'subcat_default.jpg',
//                 ]);
//                 $subcatCount++;
//                 if ($subcatCount >= 30) {
//                     break;
//                 }
//             }
//             if ($subcatCount >= 30) {
//                 break;
//             }
//         }
//     }
// }
