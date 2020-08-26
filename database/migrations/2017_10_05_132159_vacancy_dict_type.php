<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VacancyDictType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy_dict_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacancy_id')->unsigned();
            $table->foreign('vacancy_id')->references('id')->on('vacancys');
            $table->integer('dict_type_id')->unsigned();
            $table->foreign('dict_type_id')->references('id')->on('dict_candidate_types');
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
        Schema::dropIfExists('vacancy_dict_types');
    }
}
