<?php

namespace Database\Seeders;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            $this->command->info('Tidak ada kategori ditemukan. Silahkan jalankan Categoryseeder terlebih dahulu.');
            return;
        }

        $product = [
            ['name' => 'Laptop Lenovo', 'description' => 'Laptop gaming berkualitas tinggi', 'price' => '15000000'],
            ['name' => 'Kaos Polos', 'description' => 'Kaos polos nyaman untuk sehari-hari', 'price' => '50000'],
            ['name' => 'Nasi Goreng', 'description' => 'Nasi goreng spesial dengan bumbu rahasia', 'price' => '20000'],
            ['name' => 'Teh Botol', 'description' => 'Minuman teh manis segar dalam botol', 'price' => '8000'],
            ['name' => 'Novel Fiksi', 'description' => 'Novel fiksi menarik untuk mengisi waktu luang', 'price' => '75000'],
        ];

        foreach ($product as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}