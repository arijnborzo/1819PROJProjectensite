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
            'Id' => 1,
            'Title' => 'Projectenwebsite',
            'Status' => 'Accepted',
            'Short_Description' => 'Dit is de korte beschrijving',
            'Full_Description' => 'Dit is de veel veel veel langere beschrijving',
            'Teacher_Id' => 5,
            'Creator_Id' => 1,
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
