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
            $table->string('gender', 6)->nullable();
            $table->date('birthday')->nullable();
            $table->string('nationality', 15)->nullable();
            $table->string('address', 150)->nullable();
            $table->string('father', 120)->nullable();
            $table->string('mother', 120)->nullable();
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
