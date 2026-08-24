<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop ASUS ROG',
                'description' => 'Laptop gaming dengan RTX 4060',
                'price' => 12500000,
                'stock' => 10,
                'category' => 'Electronics',
            ],
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'Smartphone flagship dari Apple',
                'price' => 18000000,
                'stock' => 5,
                'category' => 'Electronics',
            ],
            [
                'name' => 'Mechanical Keyboard Keychron K2',
                'description' => 'Keyboard mechanical wireless 75%',
                'price' => 1150000,
                'stock' => 25,
                'category' => 'Computer Accessories',
            ],
            [
                'name' => 'Mouse Logitech MX Master 3S',
                'description' => 'Mouse productivity dengan silent click',
                'price' => 1350000,
                'stock' => 15,
                'category' => 'Computer Accessories',
            ],
            [
                'name' => 'Monitor LG Ultrawide 29"',
                'description' => 'Monitor ultrawide untuk produktivitas',
                'price' => 3200000,
                'stock' => 8,
                'category' => 'Electronics',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
