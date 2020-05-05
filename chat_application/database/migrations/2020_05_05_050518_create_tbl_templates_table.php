<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_templates', function (Blueprint $table) {
            $table->id('tId');
            $table->string('tName');
            $table->string('tImage')->nullable();
            $table->string('tDescription');
            $table->integer('createdBy');
            $table->tinyInteger('isActive')->default(0);
            $table->tinyInteger('isDelete')->default(0);
            $table->date('createdDate');
            $table->dateTime('modifiedDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_templates');
    }
}
