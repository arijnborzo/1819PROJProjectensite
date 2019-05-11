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
        DB::table('users')->insert([
            'id' => 6,
            'name' => "Demeester",
            'surname' => "Peter",
            'email' => "peter.demeester@odisee.be",
            'password' => bcrypt('test5'),
        ]);
        DB::table('users')->insert([
            'id' => 7,
            'name' => "Maervoet",
            'surname' => "Joris",
            'email' => "joris.maervoet@odisee.be",
            'password' => bcrypt('test6'),
    ]);
        DB::table('users')->insert([
            'id' => 8,
            'name' => "Beloe",
            'surname' => "Boemba",
            'email' => "boemba.beloe@odisee.be",
            'password' => bcrypt('test7'),
        ]);
        DB::table('users')->insert([
            'id' => 9,
            'name' => "De Vis",
            'surname' => "Nemo",
            'email' => "nemo.devis@odisee.be",
            'password' => bcrypt('test8'),
        ]);
        DB::table('users')->insert([
            'id' => 10,
            'name' => "Van Belgie",
            'surname' => "Filip",
            'email' => "Filip.vanbelgie@odisee.be",
            'password' => bcrypt('test9'),
        ]);
        DB::table('users')->insert([
            'id' => 11,
            'name' => "Tanghe",
            'surname' => "Martine",
            'email' => "martine.tanghe@odisee.be",
            'password' => bcrypt('test10'),
        ]);
    }
}
