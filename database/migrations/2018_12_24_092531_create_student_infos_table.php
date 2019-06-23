<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('grade_level')->nullable();
            $table->UnsignedInteger('strand_id')->nullable();
            $table->foreign('strand_id')->references('id')->on('strands');
            $table->UnsignedInteger('section_id')->nullable();
            $table->boolean('graduated')->default(0);
            $table->boolean('existing_student')->default(0);
            $table->boolean('registered')->default(0);
            $table->string('gender', 6)->nullable();
            $table->date('birthday')->nullable();
            $table->string('nationality', 15)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('father', 120)->nullable();
            $table->string('mother', 120)->nullable();
            $table->string('fathers_contact_number', 13)->nullable();
            $table->string('mothers_contact_number', 13)->nullable();
            $table->boolean('birth_certificate')->default(0);
            $table->boolean('form_137')->default(0);
            $table->boolean('good_moral_character')->default(0);
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
        Schema::dropIfExists('student_infos');
    }
}
