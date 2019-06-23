<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionStudentCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_student_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->string('school_year', 15)->nullable();
            $table->integer('count')->default(0);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('section_student_counts');
    }
}
