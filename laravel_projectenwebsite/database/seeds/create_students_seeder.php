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
          'Id' => 1,
          'Group_Id' => 1,
      ]);
      DB::table('students')->insert([
          'Id' => 2,
          'Group_Id' => 1,
      ]);
      DB::table('students')->insert([
          'Id' => 3,
          'Group_Id' => 1,
      ]);
      DB::table('students')->insert([
          'Id' => 4,
          'Group_Id' => 1,
      ]);
    }
}

/**
Schema::create('students', function (Blueprint $table) {
    $table->integer('Id');
    $table->enum('Belbintype', ['Bedrijfsman', 'Brononderzoeker', 'Plant', 'Monitor', 'Vormer', 'Voozitter', 'Zorgdrager', 'Groepsdrager', 'Specialist'])->nullable();
    $table->integer('Group_id')->nullable();
});
*/
