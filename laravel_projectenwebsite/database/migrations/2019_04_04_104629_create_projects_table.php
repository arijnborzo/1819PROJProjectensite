<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->Increments('Id');
            $table->string('Title');
            $table->enum('Status', ['Declined', 'Pending', 'Accepted']);
            $table->mediumText('Short_Description')->nullable();
            $table->longText('Full_Description')->nullable();
            $table->integer('Teacher_Id')->nullable();
            $table->integer('Creator_Id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
