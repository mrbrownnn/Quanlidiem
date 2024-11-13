<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_point', function (Blueprint $table) {
            $table->string('student_id',10);
            $table->string('subject_id',10);
            $table->integer('skill_1st');
            $table->integer('skill_2st');
            $table->integer('final_1st');
            $table->integer('final_2st');
            $table->primary(['student_id','subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_point');
    }
}
