<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnlineEnrolledStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_enrolled_students', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('users');
            $table->UnsignedInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->UnsignedInteger('strand_id')->nullable();
            $table->foreign('strand_id')->references('id')->on('strands');
            $table->tinyInteger('semester')->nullable();
            $table->string('academic_year', 15)->nullable();
            $table->UnsignedInteger('student_section_id')->nullable();
            $table->foreign('student_section_id')->references('id')->on('student_sections');
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
        Schema::dropIfExists('online_enrolled_students');
    }
}
