<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeValueTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('vacancy_type',255)->nullable()->default(null);
            $table->string('link_to_file',255)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('vacancy_type');
            $table->dropColumn('description');
            $table->dropColumn('link_to_file');
        });
    }
}