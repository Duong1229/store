<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'iPhone 14 Pro',
                'description' => 'iPhone 14 Pro với màn hình Super Retina XDR, chip A16 Bionic, camera 48MP.',
                'price' => 25990000,
                'stock' => 50,
                'image_url' => null, 
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'description' => 'Samsung Galaxy S23 với màn hình Dynamic AMOLED 2X, chip Snapdragon 8 Gen 2.',
                'price' => 19990000,
                'stock' => 30,
                'image_url' => null, 
            ],
            [
                'name' => 'Xiaomi 13',
                'description' => 'Xiaomi 13 với màn hình AMOLED 6.36", chip Snapdragon 8 Gen 2, camera Leica.',
                'price' => 12990000,
                'stock' => 20,
                'image_url' => null, 
            ],
            [
                'name' => 'Nokia G50',
                'description' => 'Nokia G50 với màn hình 6.82", pin 5000mAh, camera 48MP.',
                'price' => 5990000,
                'stock' => 15,
                'image_url' => null, 
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}