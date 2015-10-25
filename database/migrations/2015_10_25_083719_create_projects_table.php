<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create a the `project` table
        Schema::create('projects', function($table)
        {
            $table->increments('id');
            $table->integer('project_creators_id');
            $table->string('project_name');
            $table->longText('project_description');
            $table->dateTime('project_created_date');
            $table->dateTime('project_due_date');
            $table->dateTime('project_completed_date');
        });
        // Then add the project_id column to the `tasks` table
        Schema::table('tasks', function($table)
        {
            $table->integer('project_id');
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
