<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 14 Pro',
                'description' => 'Điện thoại cao cấp từ Apple với chip A16 Bionic.',
                'price' => 25990000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'description' => 'Flagship từ Samsung với camera 50MP.',
                'price' => 19990000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Xiaomi 13',
                'description' => 'Điện thoại giá rẻ với hiệu năng mạnh mẽ.',
                'price' => 12990000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Oppo Reno 8',
                'description' => 'Thiết kế đẹp, camera selfie đỉnh cao.',
                'price' => 10990000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nokia G50',
                'description' => 'Điện thoại bền bỉ với pin lớn.',
                'price' => 5990000,
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}