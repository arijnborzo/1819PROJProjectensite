<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->enum('belbintype', ['Bedrijfsman', 'Brononderzoeker', 'Plant', 'Monitor', 'Vormer', 'Voorzitter', 'Zorgdrager', 'Groepswerker'])->nullable();
            $table->integer('group_id')->nullable()->unsigned();
            $table->boolean('confirmed')->nullable ();
            $table->timestamps();
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
