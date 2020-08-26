<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldSourcedConsideredToVacancysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancys', function (Blueprint $table) {
            $table->integer('sourced')->nullable();
            $table->integer('declined')->nullable();
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
            $table->dropColumn('sourced');
            $table->dropColumn('declined');
        });
    }
}
