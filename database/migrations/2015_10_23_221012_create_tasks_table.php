<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function($table)
		{
		    $table->increments('id');
		    $table->string('task_creater');
		    $table->string('task_recipient');
		    $table->longText('description');
		    $table->dateTime('created_date_time');
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
