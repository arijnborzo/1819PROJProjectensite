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
          'belbintype' => 'Plant',
          'confirmed' => TRUE
        ]);
        DB::table('students')->insert([
          'id' => 2,
          'group_id' => 1,
          'confirmed' => TRUE
        ]);
        DB::table('students')->insert([
          'id' => 3,
          'group_id' => 1,
          'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
          'id' => 4,
          'group_id' => 1,
          'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 8,
            'group_id' => 2,
            'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 9,
            'group_id' => 2,
            'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 10,
            'group_id' => 2,
            'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 11,
            'group_id' => 5,
            'confirmed' => FALSE
        ]);
    }
}
