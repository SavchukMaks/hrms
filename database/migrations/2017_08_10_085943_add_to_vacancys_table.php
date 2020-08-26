<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToVacancysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancys', function (Blueprint $table) {
            $table->string('sort_candidate',255)->nullable();
            $table->string('tags',255)->nullable();
            $table->text('skills')->nullable();
            $table->string('work_times',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancys', function (Blueprint $table) {
            $table->dropColumn('sort_candidate');
            $table->dropColumn('tags');
            $table->dropColumn('skills');
            $table->dropColumn('work_times');
        });
    }
}
