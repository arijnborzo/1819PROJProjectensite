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
          'created_at' => date("Y-m-d H:i:s"),
      ]);
      DB::table('users')->insert([
          'id' => 2,
          'name' => "Petit",
          'surname' => "Lukas",
          'email' => "lukas.petit@student.odisee.be",
          'password' => bcrypt('test'),
          'created_at' => date("Y-m-d H:i:s"),
      ]);
      DB::table('users')->insert([
          'id' => 3,
          'name' => "Borzo",
          'surname' => "Arijn",
          'email' => "arijn.borzo@student.odisee.be",
          'password' => bcrypt('test'),
          'created_at' => date("Y-m-d H:i:s"),
      ]);
      DB::table('users')->insert([
          'id' => 4,
          'name' => "Stas",
          'surname' => "Arno",
          'email' => "arno.stas@student.odisee.be",
          'password' => bcrypt('test'),
          'created_at' => date("Y-m-d H:i:s"),
      ]);
      DB::table('users')->insert([
          'id' => 5,
          'name' => "Van Peteghem",
          'surname' => "Pieter",
          'email' => "pieter.vanpeteghem@odisee.be",
          'password' => bcrypt('test'),
          'created_at' => date("Y-m-d H:i:s"),
      ]);
        DB::table('users')->insert([
            'id' => 6,
            'name' => "Demeester",
            'surname' => "Peter",
            'email' => "peter.demeester@odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 7,
            'name' => "Maervoet",
            'surname' => "Joris",
            'email' => "joris.maervoet@odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
    ]);
        DB::table('users')->insert([
            'id' => 8,
            'name' => "Beloe",
            'surname' => "Boemba",
            'email' => "boemba@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 9,
            'name' => "De Vis",
            'surname' => "Nemo",
            'email' => "nemo.devis@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 10,
            'name' => "Van Belgie",
            'surname' => "Filip",
            'email' => "Filip.vanbelgie@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 11,
            'name' => "Tanghe",
            'surname' => "Martine",
            'email' => "martine.tanghe@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 12,
            'name' => "Pluk",
            'surname' => "De Plant",
            'email' => "pluk.plant@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 13,
            'name' => "De Pauw",
            'surname' => "Bart",
            'email' => "Bart.depauw@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 14,
            'name' => "De tremmerie",
            'surname' => "Dimitri",
            'email' => "DDT@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 15,
            'name' => "Vertongen",
            'surname' => "Mark",
            'email' => "mark.Vertongen@odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id' => 16,
            'name' => "Crucke",
            'surname' => "Oscar",
            'email' => "oscar@student.odisee.be",
            'password' => bcrypt('test'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
