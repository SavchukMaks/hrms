<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateWelcomeMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcome_message', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name_of_message',255);
            $table->string('type_of_vacancy', 255);
            $table->string('content_message',1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welcome_message');
    }
}
