<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
           
            $table->string('uImage');
            $table->bigInteger('createdBy')->nullable();
            $table->tinyInteger('isAdmin')->default(0);
            $table->tinyInteger('isActive')->default(0);
            $table->tinyInteger('isDelete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('uImage');
            $table->dropColumn('createdBy');
            $table->dropColumn('isAdmin');
            $table->dropColumn('isActive');
            $table->dropColumn('isDelete');
        });
    }
}
