<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Instanciar Faker para generar datos falsos
        $faker = Faker::create();

        // Crear 10 registros de tarjetas de ejemplo
        foreach (range(1, 10) as $index) {
            DB::table('cards')->insert([
                'card_number' => $faker->creditCardNumber,  // Genera un número de tarjeta aleatorio
                'cardholder_name' => $faker->name,  // Nombre aleatorio del titular
                'expiration_date' => Carbon::now()->addYears(2)->format('Y-m-d'),  // Fecha de expiración a 2 años a partir de ahora
                'CVV' => $faker->randomNumber(3, true),  // Genera un CVV aleatorio de 3 dígitos
                'Balance' => $faker->numberBetween(1000, 10000),  // Balance aleatorio entre 1000 y 10000
            ]);
        }
    }
}
