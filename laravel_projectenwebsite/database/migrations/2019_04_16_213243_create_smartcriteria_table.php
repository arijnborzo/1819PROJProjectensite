<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmartcriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smartcriteria', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->string('specific');
            $table->string('measurable');
            $table->string('acceptable');
            $table->string('realistic');
            $table->string('tolerant');
        });
        Schema::table('smartcriteria', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smartcriteria');
    }
}
