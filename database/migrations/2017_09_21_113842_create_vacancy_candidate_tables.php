<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancyCandidateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_candidate', function (Blueprint $table){
            $table->increments('id');
            $table->integer('vacancy_id')->unsigned();
            $table->integer('candidate_id')->unsigned();
            $table->timestamps();


            $table->foreign('vacancy_id')
                ->references('id')
                ->on('vacancys')
                ->onDelete('cascade');

            $table->foreign('candidate_id')
                ->references('id')
                ->on('candidates')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancy_candidate');
    }
}
