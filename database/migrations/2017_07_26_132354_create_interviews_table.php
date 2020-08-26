<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacancy_id');
            $table->string('interviewer_first_name', 255)->nullable()->default(null);
            $table->string('candidate_first_name', 255)->nullable()->default(null);
            $table->string('interviewer_last_name', 255)->nullable()->default(null);
            $table->string('candidate_last_name', 255)->nullable()->default(null);
//            $table->bigInteger('interviewer_telefon')->nullable()->default(null);
//            $table->text('notes')->nullable()->default(null);
            $table->string('interviewer_email', 100)->unique()->nullable()->default(null);
            $table->string('candidate_email', 100)->unique()->nullable()->default(null);
            $table->date('date_interview')->nullable()->default(null);
            $table->string('time_start')->nullable()->default(null);
            $table->string('time_end')->nullable()->default(null);
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
        Schema::dropIfExists('interviews');
    }
}
