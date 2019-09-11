<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterAttendances1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function(Blueprint $table)
        {
            $table->integer('slot_id')->unsigned()->nullable()->index();
            $table->dateTime('marked_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function(Blueprint $table)
        {
            $table->dropColumn('slot_id');
            $table->dropColumn('marked_at');

        });
    }
}
