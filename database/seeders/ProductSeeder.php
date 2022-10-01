<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'product 1',
            'category_id' => 1,
            'price' => 10000
        ]);

        Product::create([
            'title' => 'product 2',
            'category_id' => 1,
            'price' => 20000
        ]);
    }
}
