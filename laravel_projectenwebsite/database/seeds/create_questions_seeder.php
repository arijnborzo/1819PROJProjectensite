<?php

use Illuminate\Database\Seeder;

class create_questions_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('questions')->insert([
          'id' => 1,
          'question' => 'Het maken van een degelijke site.',
          'project_id' => 1
      ]);
      DB::table('questions')->insert([
          'id' => 2,
          'question' => 'Leren werken met laravel',
          'project_id' => 1
      ]);
    }
}
