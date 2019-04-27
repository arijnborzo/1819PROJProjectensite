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
