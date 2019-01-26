<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('users');
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->string('academic_year', 15)->nullable();
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
        Schema::dropIfExists('faculty_assignments');
    }
}
