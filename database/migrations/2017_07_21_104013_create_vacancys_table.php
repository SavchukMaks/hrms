<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('requirements')->nullable();
            $table->string('experience')->nullable();
            $table->string('remotely', 100)->nullable()->default(null);
            $table->text('description')->nullable();
            $table->string('profits')->nullable();
            $table->integer('candidates')->nullable();
            $table->string('type_candidates')->nullable()->default(null);
            $table->integer('applied')->nullable();
            $table->integer('offered')->nullable();
            $table->integer('interviewed')->nullable();
            $table->integer('accepted_candidate_id')->nullable();
            $table->boolean('is_hot')->nullable();
            $table->boolean('is_active')->nullable();
            $table->integer('work_period')->nullable();
            $table->dateTime('open_at')->nullable();
            $table->dateTime('closed_at')->nullable();
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
        Schema::dropIfExists('vacancys');
    }
}
