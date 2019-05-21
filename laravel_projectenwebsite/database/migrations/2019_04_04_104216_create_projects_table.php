µ<?php

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
            $table->Increments('id');
            $table->string('title');
            $table->enum('status', ['Declined', 'Pending', 'Accepted'])->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('creator_id')->unsigned()->nullable();
            $table->string('main_question')->nullable();
            $table->mediumText('side_questions')->nullable();
            $table->timestamps();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
