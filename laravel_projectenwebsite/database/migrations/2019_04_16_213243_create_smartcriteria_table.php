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
            $table->integer('Group_Id');
            $table->string('Specific');
            $table->string('Measurable');
            $table->string('Acceptable');
            $table->string('Realistic');
            $table->string('Tolerant');
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
