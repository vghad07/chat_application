<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTempGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_temp_group_user', function (Blueprint $table) {
             $table->id('tguId');
            $table->integer('uId')->nullable();
            $table->integer('gId')->nullable();
            $table->integer('tId');
            $table->tinyInteger('isDelete')->default(0);
            $table->tinyInteger('isActive')->default(0);
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
        Schema::dropIfExists('tbl_temp_group_user');
    }
}
