<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_classes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('batch')->nullable();
            $table->string('branch')->nullable();
            $table->integer('class_teacher_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_classes');
    }
}
