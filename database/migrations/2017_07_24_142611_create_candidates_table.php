<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 200)->nullable();
            $table->string('last_name', 200)->nullable();
            $table->string('experience', 200)->nullable();
            $table->text('description')->nullable();
            $table->string('required_position', 200)->nullable();
            $table->string('current_company', 200)->nullable();
            $table->string('current_company_position', 200)->nullable();
            $table->integer('current_company_work_period')->nullable();
            $table->dateTime('current_company_join_time')->nullable();
            $table->boolean('is_company_candidate')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
