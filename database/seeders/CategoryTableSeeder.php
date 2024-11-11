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
        // Datos de ejemplo para las categorías con subcategorías y subsubcategorías
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
            [
                'title' => 'Ropa',
                'description' => 'Prendas de vestir tradicionales y modernas.',
                'p_category_id' => null, // Categoría principal
            ],
            // Subcategorías para 'Cerámica'
            [
                'title' => 'Vasos y Tazas',
                'description' => 'Vasos, tazas y utensilios de cerámica.',
                'p_category_id' => 1, // Referencia a la categoría "Cerámica"
            ],
            [
                'title' => 'Figuras Decorativas',
                'description' => 'Figuras y decoraciones hechas de cerámica.',
                'p_category_id' => 1, // Referencia a la categoría "Cerámica"
            ],
            // Subcategorías para 'Textiles'
            [
                'title' => 'Tejidos',
                'description' => 'Textiles tejidos a mano.',
                'p_category_id' => 2, // Referencia a la categoría "Textiles"
            ],
            [
                'title' => 'Accesorios de Tela',
                'description' => 'Bolsos, carteras y otros accesorios elaborados con tela.',
                'p_category_id' => 2, // Referencia a la categoría "Textiles"
            ],
            // Subcategorías para 'Joyería'
            [
                'title' => 'Collares',
                'description' => 'Collares y colgantes elaborados con piedras y metales.',
                'p_category_id' => 3, // Referencia a la categoría "Joyería"
            ],
            [
                'title' => 'Pulseras',
                'description' => 'Pulseras hechas a mano con piedras naturales.',
                'p_category_id' => 3, // Referencia a la categoría "Joyería"
            ],
            // Subcategorías para 'Madera'
            [
                'title' => 'Figuras Talladas',
                'description' => 'Figuras talladas en madera para decoración.',
                'p_category_id' => 4, // Referencia a la categoría "Madera"
            ],
            [
                'title' => 'Utensilios',
                'description' => 'Utensilios de cocina y objetos utilitarios de madera.',
                'p_category_id' => 4, // Referencia a la categoría "Madera"
            ],
            // Subcategorías para 'Cestería'
            [
                'title' => 'Cestos',
                'description' => 'Cestos y canastas hechas de fibras naturales.',
                'p_category_id' => 5, // Referencia a la categoría "Cestería"
            ],
            [
                'title' => 'Bolsos',
                'description' => 'Bolsos y carteras hechas de fibras naturales.',
                'p_category_id' => 5, // Referencia a la categoría "Cestería"
            ],
            // Subcategorías para 'Ropa'
            [
                'title' => 'Ropa Tradicional',
                'description' => 'Prendas de vestir tradicionales de diferentes culturas.',
                'p_category_id' => 6, // Referencia a la categoría "Ropa"
            ],
            [
                'title' => 'Ropa Moderna',
                'description' => 'Ropa moderna y de última moda.',
                'p_category_id' => 6, // Referencia a la categoría "Ropa"
            ],
            // Subsubcategorías para "Vasos y Tazas"
            [
                'title' => 'Tazas Pintadas a Mano',
                'description' => 'Tazas con diseños pintados a mano.',
                'p_category_id' => 7, // Referencia a la categoría "Vasos y Tazas"
            ],
            [
                'title' => 'Vasos Decorativos',
                'description' => 'Vasos decorados con estilo artístico.',
                'p_category_id' => 7, // Referencia a la categoría "Vasos y Tazas"
            ],
            // Subsubcategorías para "Tejidos"
            [
                'title' => 'Tejidos Andinos',
                'description' => 'Tejidos tradicionales de las regiones andinas.',
                'p_category_id' => 8, // Referencia a la categoría "Tejidos"
            ],
            [
                'title' => 'Tejidos Contemporáneos',
                'description' => 'Tejidos modernos con técnicas actuales.',
                'p_category_id' => 8, // Referencia a la categoría "Tejidos"
            ],
        ];

        // Inserta los datos en la tabla
        DB::table('categories')->insert($categories);
    }
}
