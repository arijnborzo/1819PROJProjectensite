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
          'id' => 5,
        ]);
        DB::table('teachers')->insert([
            'id' => 6,
        ]);
        DB::table('teachers')->insert([
            'id' => 7,
        ]);
    }
}
