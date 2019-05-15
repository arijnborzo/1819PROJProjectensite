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
            $table->integer('project_id');
            $table->string('specific');
            $table->string('measurable');
            $table->string('acceptable');
            $table->string('realistic');
            $table->string('tolerant');
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
