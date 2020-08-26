<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeVacancys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancys', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->nullable()->default(null);
            $table->integer('client_id')->unsigned()->nullable()->default(null);
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
            $table->dropColumn('category_id');
            $table->dropColumn('client_id');
        });
    }
}
