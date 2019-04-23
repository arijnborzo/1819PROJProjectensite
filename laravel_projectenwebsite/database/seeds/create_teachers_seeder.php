<?php

use Illuminate\Database\Seeder;

class create_teachers_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('teachers')->insert([
          'Id' => 1,
      ]);
    }
}
