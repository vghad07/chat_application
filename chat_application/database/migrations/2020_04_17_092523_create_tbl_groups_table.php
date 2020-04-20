<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_groups', function (Blueprint $table) {
            $table->Id('gId');
            $table->string('gName');
            $table->string('gDescription');
            $table->string('gImage');
            $table->integer('createdBy');
            $table->date('createdDate');
            $table->dateTime('modifiedDate');
            $table->tinyInteger('isDelete');
            $table->tinyInteger('isActive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_groups');
    }
}
