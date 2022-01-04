<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'name' => 'Cordoba',
                'abbreviation' => 'C$',
                'country' => 'Nicaragua'
            ],
            [
                'name' => 'Dolar',
                'abbreviation' => '$',
                'country' => 'Estados Unidos'
            ],
            [
                'name' => 'Euro',
                'abbreviation' => '€',
                'country' => 'España'
            ]
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
