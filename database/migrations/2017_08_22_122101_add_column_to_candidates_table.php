<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('skills',255)->nullable();
            $table->string('education',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('email',255)->unique()->nullable();
            $table->string('photoCandidate',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn('skills');
            $table->dropColumn('education');
            $table->dropColumn('linkedin');
            $table->dropColumn('facebook');
            $table->dropColumn('email');
            $table->dropColumn('photoCandidate');
        });
    }
}
