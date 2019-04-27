<?php

use Illuminate\Database\Seeder;

class create_smartcriteria_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('smartcriteria')->insert([
          'Group_Id' => 1,
          'Specific' => 'Vernieuwen van de huidige site',
          'Measurable' => 'De website moet de leerlingen van het 2e jaar tegelijk op de website toelaten',
          'Acceptable' => 'De website moet volledig werkende zijn',
          'Realistic' => 'Website moet moderne methodes gebruiken',
          'Tolerant' => 'Groepen moeten kunnen worden verdeeld',
      ]);
    }
}
