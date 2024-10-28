<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run()
    {
        // Aquí se pueden agregar autores a la tabla 'autors'
        $authors = [
            [
                'firstname' => 'Killa',
                'lastname' => 'Mendez',
            ],
            [
                'firstname' => 'Inti',
                'lastname' => 'Huamán',
            ],
            [
                'firstname' => 'Sumaq',
                'lastname' => 'Tello',
            ],
            [
                'firstname' => 'Pachamama',
                'lastname' => 'Castro',
            ]
        ];

        // Insertar los autores en la base de datos
        DB::table('autors')->insert($authors);
    }
}
