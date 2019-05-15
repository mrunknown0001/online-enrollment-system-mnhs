<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 50);
            $table->string('middlename', 50)->nullable();
            $table->string('lastname', 50);
            $table->string('prefix_name', 5)->nullable();
            $table->string('student_number', 16)->unique()->nullable();
            $table->string('employee_id', 15)->unique()->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('mobile_number', 100)->unique()->nullable();
            $table->string('position', 200)->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->string('password', 200);
            $table->tinyInteger('user_type')->default(3);
            // 1 for admin, 2 for faculty, 3 for students
            $table->boolean('active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
