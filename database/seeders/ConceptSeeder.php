<?php

namespace Database\Seeders;

use App\Models\Concept;
use Illuminate\Database\Seeder;

class ConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concepts = [
            ['name' => 'Pago mensualidad', 'price' => 1200],
            ['name' => 'Pago maestria', 'price' => 2500],
            ['name' => 'Curso de verano', 'price' => 300],
            ['name' => 'Tutoria', 'price' => 4000]
        ];

        foreach ($concepts as $concept) {
            Concept::create($concept);
        }
    }
}
