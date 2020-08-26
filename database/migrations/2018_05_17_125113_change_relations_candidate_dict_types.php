<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRelationsCandidateDictTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_dict_types', function (Blueprint $table) {

            $table->dropForeign('candidate_dict_types_candidate_id_foreign');
            $table->dropForeign('candidate_dict_types_dict_type_id_foreign');

            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('dict_type_id')->references('id')->on('dict_candidate_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate_dict_types', function (Blueprint $table) {

            $table->dropForeign('candidate_dict_types_candidate_id_foreign');
            $table->dropForeign('candidate_dict_types_dict_type_id_foreign');

            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('dict_type_id')->references('id')->on('dict_candidate_types');
        });
    }
}
