<?php

use Illuminate\Database\Seeder;

class create_projects_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'id' => 1,
            'title' => 'Projectenwebsite',
            'status' => 'Accepted',
            'short_description' => 'Dit is de korte beschrijving',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 5,
            'creator_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('projects')->insert([
            'id' => 2,
            'title' => 'Varen met een boot',
            'status' => 'Accepted',
            'short_description' => 'We willen een boot doen varen',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 6,
            'creator_id' => 8,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('projects')->insert([
            'id' => 3,
            'title' => 'Gras afrijden',
            'status' => 'Accepted',
            'short_description' => 'Het gras korter maken',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 7,
            'creator_id' => 9,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('projects')->insert([
            'id' => 4,
            'title' => 'Een Duvel drinken',
            'status' => 'Accepted',
            'short_description' => 'Geniet van de smaak',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 5,
            'creator_id' => 10,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('projects')->insert([
            'id' => 5,
            'title' => 'Een ei bakken',
            'status' => 'Accepted',
            'short_description' => 'Het ei breken en in de pan leggen',
            'full_description' => 'Dit is de veel veel veel langere beschrijving',
            'teacher_id' => 6,
            'creator_id' => 2,
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
/**
Schema::create('projects', function (Blueprint $table) {
    $table->Increments('Id');
    $table->string('Title');
    $table->enum('Status', ['Declined', 'Pending', 'Accepted']);
    $table->mediumText('Short_Description');
    $table->longText('Full_Description');
    $table->integer('Teacher_Id');
    $table->integer('Creator_Id');
    $table->timestamps();
});
*/
