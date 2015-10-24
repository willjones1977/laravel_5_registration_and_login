<?php	namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tasks\Tasks;
// TasksController.php

class TasksController extends Controller{
	public function showTasks(){
		$tasks = Tasks::all();
		return view('tasks.todo')->with('tasks', $tasks);		
	}
	public function showAddTask(){
		return view('tasks.addTask');		

	}
	public function addTask(){
		$postedTask = \Input::all();
		error_log(print_r($postedTask, true));
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

}
