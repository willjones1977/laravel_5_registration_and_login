<?php	
// TasksController.php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Tasks\Tasks;
use App\Projects\Projects;

class TasksController extends Controller{
	public function showAllUncompletedTasksAssignedToUser(){
		$tasks = Tasks::where('completed_date_time',  '0000-00-00 00:00:00')
					  ->where('task_recipient', \Auth::user()->name )->paginate(5);
		return view('tasks.todo')->with('tasks', $tasks);		
	}
	// Show the addTask view
	public function showAddTask(){
		$availableProjects = Projects::where('project_creators_id', \Auth::user()->id )->get();



		return view('tasks.addTask')->with('availableProjects', $availableProjects) ;		
	}
	// Add a task to the `tasks` table 
	public function addTask(){
		// $postedTask 		= \Input::all();
		$taskRecipient 		= \Input::get('taskRecipient');
		$dueDate 			= \Input::get('dueDate');
		$taskDescription 	= \Input::get('taskDescription');
		$newTask = new Tasks;
		$newTask->task_recipient 	= $taskRecipient;
		$newTask->description    	= $taskDescription;
		$newTask->created_date_time = date('Y-m-d H:i:s');
		$newTask->due_date_time  	= $dueDate;
		$newTask->task_creater   	= \Auth::user()->name;
		$newTask->project_id 		= \Input::get('project');
		$newTask->save();
		return redirect('todo');	
		//return view('tasks.addTask');	
	}
	public function markTaskComplete(){
		$taskId = \Input::get('taskid');
		error_log("taskId " . $taskId);
		//echo $taskId;
		$taskToUpdate = Tasks::where('id', $taskId )->first();
		$taskToUpdate->completed_date_time = date('Y-m-d H:i:s');
		$taskToUpdate->save();
		$tasks = Tasks::where('completed_date_time',  '0000-00-00 00:00:00')
					  ->where('task_recipient', \Auth::user()->name )->get();
		
	}

}
