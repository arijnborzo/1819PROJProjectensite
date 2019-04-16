<?php

use Illuminate\Database\Seeder;

class create_users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'Id' => 1,
          'Name' => "Lauwers",
          'Surname' => "Andreas",
          'Email' => "andreas.lauwers@student.odisee.be",
          'Password' => bcrypt('secret'),
      ]);
    }
}
