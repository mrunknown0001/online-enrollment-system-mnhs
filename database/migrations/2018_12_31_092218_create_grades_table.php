<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->tinyInteger('grade')->nullable();
            $table->float('grade_equiv', 4, 2)->nullable();
            $table->boolean('passed')->default(1);
            $table->tinyInteger('grade_level')->nullable();
            $table->string('school_year', 10)->nullable();
            $table->string('remarks', 50)->nullable();
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
        Schema::dropIfExists('grades');
    }
}
