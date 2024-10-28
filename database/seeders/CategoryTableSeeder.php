<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de ejemplo para las categorías
        $categories = [
            [
                'title' => 'Cerámica',
                'description' => 'Artesanías hechas de arcilla y barro, decoradas con diseños tradicionales.',
                'p_category_id' => null, // Categoría principal
            ],
            [
                'title' => 'Textiles',
                'description' => 'Ropa y accesorios elaborados con técnicas ancestrales de tejido.',
                'p_category_id' => null, // Categoría principal
            ],
            [
                'title' => 'Joyería',
                'description' => 'Joyas hechas a mano, incluyendo collares y pulseras con piedras naturales.',
                'p_category_id' => null, // Categoría principal
            ],
            [
                'title' => 'Madera',
                'description' => 'Artículos de madera tallada, como figuras y utensilios.',
                'p_category_id' => null, // Categoría principal
            ],
            [
                'title' => 'Cestería',
                'description' => 'Cestos y otros productos hechos de fibras naturales.',
                'p_category_id' => null, // Categoría principal
            ],
            // Puedes añadir más categorías aquí
        ];

        // Inserta los datos en la tabla
        DB::table('categories')->insert($categories);
    }
}
