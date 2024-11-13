<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subject', function (Blueprint $table) {
            $table->string('subject_id',10);
            $table->string('subject_name',50);
            $table->integer('total_subject',10);
            $table->string('lecturers_id',10);
            $table->date('start_subject');
            $table->integer('is_skill',10);
            $table->integer('is_final',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_subject');
    }
}
