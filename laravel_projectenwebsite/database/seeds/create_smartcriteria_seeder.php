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
          'group_id' => 1,
          'specific' => 'Vernieuwen van de huidige site',
          'measurable' => 'De website moet de leerlingen van het 2e jaar tegelijk op de website toelaten',
          'acceptable' => 'De website moet volledig werkende zijn',
          'realistic' => 'Website moet moderne methodes gebruiken',
          'tolerant' => 'Groepen moeten kunnen worden verdeeld',
      ]);
    }
}
