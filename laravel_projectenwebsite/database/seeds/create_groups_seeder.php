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
            'id' => 1,
            'project_id' => 1,
        ]);
        DB::table('groups')->insert([
            'id' => 2,
            'project_id' => 2,
        ]);
        DB::table('groups')->insert([
            'id' => 3,
            'project_id' => 3,
        ]);
        DB::table('groups')->insert([
            'id' => 4,
            'project_id' => 4,
        ]);
        DB::table('groups')->insert([
            'id' => 5,
            'project_id' => 5,
        ]);
        DB::table('groups')->insert([
            'id' => 6,
            'project_id' => 6,
        ]);
    }
}
