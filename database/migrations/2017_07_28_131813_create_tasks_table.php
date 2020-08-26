<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id')->nullable()->default(null);
            $table->integer('vacancy_id')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('skill')->nullable()->default(null);
            $table->timestamps();
        });

//        Schema::table('tasks', function($table) {
//            $table->foreign('category_id')->references('id')->on('VacancyCategories');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
