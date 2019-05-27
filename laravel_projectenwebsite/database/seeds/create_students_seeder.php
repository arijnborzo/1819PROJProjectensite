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
          'belbintype' => 'Plant geel',
          'confirmed' => TRUE,
          'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('students')->insert([
          'id' => 2,
          'group_id' => 1,
            'belbintype' => 'Bedrijfsman rood blauw',
            'created_at' => date("Y-m-d H:i:s"),
          'confirmed' => TRUE
        ]);
        DB::table('students')->insert([
          'id' => 3,
          'group_id' => 1,
          'belbintype' => 'Brononderzoeker groen geel',
          'created_at' => date("Y-m-d H:i:s"),
          'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
          'id' => 4,
          'group_id' => 1,
          'belbintype' => 'Groepswerker groen',
          'created_at' => date("Y-m-d H:i:s"),
          'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 8,
            'group_id' => 2,
            'belbintype' => 'Brononderzoeker groen geel',
            'created_at' => date("Y-m-d H:i:s"),
            'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 9,
            'group_id' => 2,
            'belbintype' => 'Vormer rood',
            'created_at' => date("Y-m-d H:i:s"),
            'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 10,
            'group_id' => 2,
            'belbintype' => 'Voorzitter blauw groen',
            'created_at' => date("Y-m-d H:i:s"),
            'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 11,
            'group_id' => 5,
            'belbintype' => 'Monitor geel rood',
            'created_at' => date("Y-m-d H:i:s"),
            'confirmed' => FALSE
        ]);
        DB::table('students')->insert([
            'id' => 12,
            'group_id' => 5,
            'belbintype' => 'Vormer rood',
            'created_at' => date("Y-m-d H:i:s"),
            'confirmed' => FALSE
        ]);
    }
}
