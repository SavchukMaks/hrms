<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->dropColumn('candidate_first_name');
            $table->dropColumn('candidate_last_name');
            $table->dropColumn('candidate_email');
            $table->addColumn('integer', 'candidate_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->dropColumn('candidate_id');
            $table->addColumn('string', 'candidate_first_name');
            $table->addColumn('string', 'candidate_last_name');
            $table->addColumn('string', 'candidate_email');
        });
    }
}
