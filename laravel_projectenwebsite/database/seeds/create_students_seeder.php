<?php

use Illuminate\Database\Seeder;

class create_students_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('students')->insert([
          'id' => 1,
          'group_id' => 1,
          'belbintype' => 'Plant'
      ]);
      DB::table('students')->insert([
          'id' => 2,
          'group_id' => 1,
      ]);
      DB::table('students')->insert([
          'id' => 3,
          'group_id' => 1,
      ]);
      DB::table('students')->insert([
          'id' => 4,
          'group_id' => 1,
      ]);
    }
}
