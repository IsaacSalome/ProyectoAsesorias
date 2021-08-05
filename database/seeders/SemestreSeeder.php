<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semestres;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semestres::create([
            'numeroSemestre' => 'I',

        ]);    
        Semestres::create([
            'numeroSemestre' => 'II',

        ]);    
        Semestres::create([
            'numeroSemestre' => 'III',

        ]);    
        Semestres::create([
            'numeroSemestre' => 'IV',

        ]);    
        Semestres::create([
            'numeroSemestre' => 'V',

        ]);    
        Semestres::create([
            'numeroSemestre' => 'VI',

        ]);    
        Semestres::create([
            'numeroSemestre' => 'VII',

        ]);    
    }
}
