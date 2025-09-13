<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class EcoBagFullSeeder extends Seeder
{
    public function run()
    {
        // Create Category
        $category = Category::create([
            'name'  => 'Eco-Friendly Bags',
            'image' => 'https://images.unsplash.com/photo-1585386959984-a4155228f94b?fit=crop&w=600&q=80',
        ]);

        // Define 10 subcategories
        $subcategories = [
            ['Jute Bags', 'https://images.unsplash.com/photo-1621323038991-68c24657f75e?fit=crop&w=600&q=80'],
            ['Cotton Bags', 'https://images.unsplash.com/photo-1585386959984-a4155228f94b?fit=crop&w=600&q=80'],
            ['Hemp Bags', 'https://images.unsplash.com/photo-1603251585686-abc15e2159a2?fit=crop&w=600&q=80'],
            ['Canvas Bags', 'https://images.unsplash.com/photo-1612204620172-9757c5766ce1?fit=crop&w=600&q=80'],
            ['Paper Bags', 'https://images.unsplash.com/photo-1611095966353-3c89d1a73871?fit=crop&w=600&q=80'],
            ['Recycled Plastic Bags', 'https://images.unsplash.com/photo-1605733512599-3dabc7c72b8e?fit=crop&w=600&q=80'],
            ['Drawstring Bags', 'https://images.unsplash.com/photo-1587304034061-67d8ac162e8b?fit=crop&w=600&q=80'],
            ['Organic Tote Bags', 'https://images.unsplash.com/photo-1593032465174-31d58eaa13b7?fit=crop&w=600&q=80'],
            ['Shopping Bags', 'https://images.unsplash.com/photo-1578996953841-ecf7d5e77688?fit=crop&w=600&q=80'],
            ['Lunch Bags', 'https://images.unsplash.com/photo-1629780296665-c60952c7f1d1?fit=crop&w=600&q=80'],
        ];

        foreach ($subcategories as $sub) {
            $subcat = Subcategory::create([
                'category_id' => $category->id,
                'name'        => $sub[0],
                'image'       => $sub[1],
            ]);

            // Create 5 products for each subcategory
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'category_id'    => $category->id,
                    'subcategory_id' => $subcat->id,
                    'title'          => "{$sub[0]} Product $i",
                    'description'    => "High-quality {$sub[0]} designed for sustainability and everyday use.",
                    'main_image'     => $sub[1],
                    'image_1'        => $sub[1],
                    'image_2'        => $sub[1],
                    'image_3'        => $sub[1],
                    'image_4'        => $sub[1],
                    'price'          => rand(199, 599),
                    'discount'       => rand(5, 30),
                    'height'         => rand(30, 50),
                    'width'          => rand(25, 40),
                    'handle'         => 'Yes',
                    'base'           => 'Eco Fabric',
                ]);
            }
        }
    }
}
