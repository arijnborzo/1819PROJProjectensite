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
          'Password' => bcrypt('test'),
      ]);
      DB::table('users')->insert([
          'Id' => 2,
          'Name' => "Petit",
          'Surname' => "Lukas",
          'Email' => "lukas.petit@student.odisee.be",
          'Password' => bcrypt('test1'),
      ]);
      DB::table('users')->insert([
          'Id' => 3,
          'Name' => "Borzo",
          'Surname' => "Arijn",
          'Email' => "arijn.borzo@student.odisee.be",
          'Password' => bcrypt('test2'),
      ]);
      DB::table('users')->insert([
          'Id' => 4,
          'Name' => "Stas",
          'Surname' => "Arno",
          'Email' => "andreas.lauwers@student.odisee.be",
          'Password' => bcrypt('test3'),
      ]);
      DB::table('users')->insert([
          'Id' => 5,
          'Name' => "Van Peteghem",
          'Surname' => "Pieter",
          'Email' => "pieter.vanpeteghem@odisee.be",
          'Password' => bcrypt('test4'),
      ]);
    }
}
