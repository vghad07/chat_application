<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblGroupChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_group_chat', function (Blueprint $table) {
            $table->id('gcId');
            $table->integer('uId');
            $table->integer('gId');
            $table->string('chatMessage');
            $table->string('chatImage');
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
        Schema::dropIfExists('tbl_group_chat');
    }
}
