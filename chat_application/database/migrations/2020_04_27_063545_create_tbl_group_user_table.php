<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_group_user', function (Blueprint $table) {
             $table->id('guId');
            $table->integer('uId');
            $table->integer('gId');
            $table->tinyInteger('isDelete');
            $table->tinyInteger('isActive');
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
        Schema::dropIfExists('tbl_group_user');
    }
}
