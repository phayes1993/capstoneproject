<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('password_entries', function (Blueprint $table) {
            $table->string('saved_password');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('password_entries', function (Blueprint $table) {
            $table->string('label');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('password_entries', function (Blueprint $table) {
            $table->dropforeign('user_id');

            $table->dropColumn(['saved_password' , 'user_id','label']);

        });
    }
}
