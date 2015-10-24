<?php	namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tasks\Tasks;
// TasksController.php

class TasksController extends Controller{
	public function showAllUncompletedTasksAssignedToUser(){
		$tasks = Tasks::where('completed_date_time',  '0000-00-00 00:00:00')
					  ->where('task_recipient', \Auth::user()->name )->paginate(5);
		return view('tasks.todo')->with('tasks', $tasks);		
	








	}
	public function showAddTask(){
		return view('tasks.addTask');		

	}
	public function addTask(){
		$postedTask = \Input::all();
		$taskRecipient = \Input::get('taskRecipient');
		$dueDate = \Input::get('dueDate');
		$taskDescription = \Input::get('taskDescription');
		$newTask = new Tasks;
		$newTask->task_recipient = $taskRecipient;
		$newTask->description    = $taskDescription;
		$newTask->due_date_time  = $dueDate;
		$newTask->task_creater   = $user = \Auth::user()->name;
		$newTask->save();
		return view('tasks.addTask');	
	}
	public function markTaskComplete(){
		$taskId = \Input::get('taskid');
		echo $taskId;
		$taskToUpdate = Tasks::where('id', $taskId )->first();
		$taskToUpdate->completed_date_time = date('Y-m-d H:i:s');
		$taskToUpdate->save();
		$tasks = Tasks::where('completed_date_time',  '0000-00-00 00:00:00')
					  ->where('task_recipient', \Auth::user()->name )->get();
		
	}

}
