<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // CategorySeeder::class,
            //  SubcategorySeeder::class,
            //     ProductSeeder::class,
                  EcoBagFullSeeder::class,
            // other seeders like SubcategorySeeder, ProductSeeder
        ]);
    }
}
