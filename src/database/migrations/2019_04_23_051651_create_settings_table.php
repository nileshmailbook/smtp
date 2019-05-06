<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('driver');  //driver smtp or mail
            $table->string('host'); //smtp host
            $table->string('username'); //email
            $table->string('password'); //password
            $table->string('encryption');
            $table->string('port');// port
            $table->string('name'); //header name
            $table->string('recipient'); // reciever emails
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
