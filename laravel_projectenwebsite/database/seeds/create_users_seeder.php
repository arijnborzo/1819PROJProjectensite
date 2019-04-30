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
          'id' => 1,
          'name' => "Lauwers",
          'surname' => "Andreas",
          'email' => "andreas.lauwers@student.odisee.be",
          'password' => bcrypt('test'),
      ]);
      DB::table('users')->insert([
          'id' => 2,
          'name' => "Petit",
          'surname' => "Lukas",
          'email' => "lukas.petit@student.odisee.be",
          'password' => bcrypt('test1'),
      ]);
      DB::table('users')->insert([
          'id' => 3,
          'name' => "Borzo",
          'surname' => "Arijn",
          'email' => "arijn.borzo@student.odisee.be",
          'password' => bcrypt('test2'),
      ]);
      DB::table('users')->insert([
          'id' => 4,
          'name' => "Stas",
          'surname' => "Arno",
          'email' => "arno.stas@student.odisee.be",
          'password' => bcrypt('test3'),
      ]);
      DB::table('users')->insert([
          'id' => 5,
          'name' => "Van Peteghem",
          'surname' => "Pieter",
          'email' => "pieter.vanpeteghem@odisee.be",
          'password' => bcrypt('test4'),
      ]);
    }
}
