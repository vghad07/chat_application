<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chat', function (Blueprint $table) {
            $table->id('chatId');
            $table->integer('senderId');
            $table->integer('receiverId');
            $table->string('message');
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
        Schema::dropIfExists('tbl_chat');
    }
}
