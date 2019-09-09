<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendees', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->integer('student_id')->unsigned()->nullable()->index();
            $table->integer('attendance_id')->unsigned()->nullable()->index();
            $table->string('status')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attendees');
    }
}
