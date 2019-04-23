<?php

use Illuminate\Database\Seeder;

class create_groups_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('groups')->insert([
          'Id' => 1,
          'Project_Id' => 1,
      ]);
    }
}
