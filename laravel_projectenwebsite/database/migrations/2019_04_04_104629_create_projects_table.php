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
            $table->Increments('id');
            $table->string('title');
            $table->enum('status', ['Declined', 'Pending', 'Accepted'])->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('creator_id')->nullable();
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
