<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTblChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


  
    public function up()
    {
        Schema::table('tbl_chat', function (Blueprint $table) {
            //
            $table->integer('senderId')->nullable()->change();
            $table->integer('receiverId')->nullable()->change();
            $table->string('chatImage',255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_chat', function (Blueprint $table) {
            //
        });
    }
}
