<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories  = Category::all();
        $subcatCount = 0;

        foreach ($categories as $category) {
            for ($i = 1; $i <= 6; $i++) {
                Subcategory::create([
                    'category_id' => $category->id,
                    'name'        => $category->name . ' Subcategory ' . $i,
                    'image'       => 'subcat_default.jpg',
                ]);
                $subcatCount++;
                if ($subcatCount >= 30) {
                    break;
                }
            }
            if ($subcatCount >= 30) {
                break;
            }
        }
    }
}
