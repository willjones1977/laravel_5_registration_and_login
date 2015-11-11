<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_users', function($table)
        {
            $table->increments('id');
            $table->integer('task_id');
            $table->integer('user_id');
            $table->dateTime('date_assigned');
            $table->dateTime('due_date_time');
            $table->dateTime('completed_date_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
