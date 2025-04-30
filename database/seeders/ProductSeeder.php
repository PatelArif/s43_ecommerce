<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $subcategories = Subcategory::all();

        foreach ($subcategories as $subcat) {
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'category_id'    => $subcat->category_id,
                    'subcategory_id' => $subcat->id,
                    'title'          => 'Product ' . $i . ' in ' . $subcat->name,
                    'description'    => 'This is a description for product ' . $i,
                    'main_image'     => 'main.jpg',
                    'image_1'        => '1.jpg',
                    'image_2'        => '2.jpg',
                    'image_3'        => '3.jpg',
                    'image_4'        => '4.jpg',
                    'price'          => rand(100, 500),
                    'discount'       => rand(5, 20),
                    'height'         => '18',
                    'width'          => '19 1/2',
                    'handle'         => '8',
                    'base'           => '6 1/2',
                ]);
            }
        }
    }
}
