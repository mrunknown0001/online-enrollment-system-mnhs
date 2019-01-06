<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 120)->nullable();
            $table->string('code', 50)->nullable();
            $table->text('description')->nullable();
            $table->integer('prerequisite')->nullable();
            $table->tinyInteger('grade_level')->nullable();
            $table->unsignedInteger('strand_id')->nullable();
            $table->foreign('strand_id')->references('id')->on('strands');
            $table->tinyInteger('semester')->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
