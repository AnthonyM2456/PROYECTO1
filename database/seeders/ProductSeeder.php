<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Category;
use App\Models\Autor;
use App\Models\Promotion;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all()->pluck('id')->toArray();
        $autors = Autor::all()->pluck('id')->toArray();
        //$promotions = Promotion::all()->pluck('id')->toArray();

        Product::create([
            'picture' => 'product1.png', // Asegúrate de que la imagen existe en la carpeta 'images'
            'title' => 'Producto 1',
            'price' => 100,
            'description' => 'Descripción del Producto 1',
            'category_id' => $categories[array_rand($categories)],
            'autor_id' => $autors[array_rand($autors)],
            'promotion_id' => null,
        ]);

        Product::create([
            'picture' => 'product2.jpg',
            'title' => 'Producto 2',
            'price' => 200,
            'description' => 'Descripción del Producto 2',
            'category_id' => $categories[array_rand($categories)],
            'autor_id' => $autors[array_rand($autors)],
            'promotion_id' => null,
        ]);

        Product::create([
            'picture' => 'product3.jpeg',
            'title' => 'Producto 3',
            'price' => 300,
            'description' => 'Descripción del Producto 3',
            'category_id' => $categories[array_rand($categories)],
            'autor_id' => $autors[array_rand($autors)],
            'promotion_id' => null, // Sin promoción
        ]);

        Product::create([
            'picture' => 'product4.jpg',
            'title' => 'Producto 4',
            'price' => 400,
            'description' => 'Descripción del Producto 4',
            'category_id' => $categories[array_rand($categories)],
            'autor_id' => $autors[array_rand($autors)],
            'promotion_id' => null,
        ]);

        Product::create([
            'picture' => 'product5.jpg',
            'title' => 'Producto 5',
            'price' => 500,
            'description' => 'Descripción del Producto 5',
            'category_id' => $categories[array_rand($categories)],
            'autor_id' => $autors[array_rand($autors)],
            'promotion_id' => null,
        ]);

        Product::create([
            'picture' => 'product6.jpg',
            'title' => 'Producto 6',
            'price' => 600,
            'description' => 'Descripción del Producto 6',
            'category_id' => $categories[array_rand($categories)],
            'autor_id' => $autors[array_rand($autors)],
            'promotion_id' => null,
        ]);
    }
}
