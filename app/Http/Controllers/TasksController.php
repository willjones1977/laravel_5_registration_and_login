<?php	
// TasksController.php

namespace 	App\Http\Controllers;
use 		App\Http\Controllers\Controller;
use 		App\Tasks\Tasks;
use 		App\Tasks\TaskUsers;
use 		App\User;
use 		App\Projects\Projects;

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
		return  $newTask;
		//return redirect('todo');	
	}
	public function markTaskComplete(){
		$taskId = \Input::get('taskid');
		$taskToUpdate = Tasks::where('id', $taskId )->first();
		$taskToUpdate->completed_date_time = date('Y-m-d H:i:s');
		$taskToUpdate->save();
		$tasks = Tasks::where('completed_date_time',  '0000-00-00 00:00:00')
					  ->where('task_recipient', \Auth::user()->name )->get();
		
	}
	public function getUsersAssignedAndNotAssigned(){
		$taskid = \Input::get('taskid');
		
		$assignedUsers = TaskUsers::where('task_id', $taskid)->get();
		// Add the assigned users name
			foreach($assignedUsers as $key => $assignedUser):
				$userId = $assignedUser->user_id;
				$userInfo = User::where('id', $userId)->pluck('name');
				$assignedUsers[$key]->name = $userInfo;
			endforeach;	
		$assignedUsersArray = array();
		foreach($assignedUsers as $assignedUser):
			$assignedUsersArray[] = $assignedUser->user_id;
		endforeach;
		
		$notAssignedUsers 	= array();
		$notAssignedUsers = User::whereNotIn('id', $assignedUsersArray )->get();
		$users['assignedUsers'] 	= $assignedUsers; 
		$users['notAssignedUsers'] 	= $notAssignedUsers;

		return $users;
	}
	public function setUsersAssignedAndNotAssigned(){
		// If there are no assigned users in  \Input::get('assignedUsers').. the foreach breaks
		$taskid			= \Input::get('taskid');
		$assignedUsers 	= \Input::get('assignedUsers');
		$availableUsers = \Input::get('availableUsers');
		// Make sure $assignedUsers are assigned
			if(isset($assignedUsers)):	
				foreach($assignedUsers as $userid):
					// if the users is not assigned to the task.. assign them
					$taskUser = TaskUsers::where('task_id', $taskid)
										 ->where('user_id', $userid)->first();

					// If there is not a task user with the give criteria .. assign the user using the given criteria
						if(is_null($taskUser)):
							error_log("assign the user with id " . $userid );
							$newTaskUser = new TaskUsers;
							$newTaskUser->task_id 				= $taskid;
							$newTaskUser->user_id 				= $userid;
							$newTaskUser->date_assigned 		= date('Y-m-d H:is');
							$newTaskUser->due_date_time 		= '0000-00-00 00:00:00';
							$newTaskUser->completed_date_time 	= '0000-00-00 00:00:00';
							$newTaskUser->save();
						endif;
					// If the user is already assigned.. no need to reassign them
				endforeach;
			endif;
		// Make sure $availableUsers are unassigned 
			if(isset($availableUsers)):
				foreach($availableUsers as $availableUserId):
					$taskUser = TaskUsers::where('task_id', $taskid)
										 ->where('user_id', $availableUserId)->first();			
					if(! is_null($taskUser)):
						// Then remove the given user from the task..
						$taskUser->delete();
					endif;
				endforeach;
			endif;
		// error_log("availableUsers " . print_r($availableUsers, true));
		// error_log("assignedUsers " . print_r($assignedUsers, true));
		// Attach the usernames to the $assignedUsers and $availableUsers arrays.
			$result = array();
			$availableUser = array();
			if(isset($availableUsers)):	
				foreach($availableUsers as $availableUserId):
					
					$availableUser['user_id'] = $availableUserId ;
					$availableUser['username'] = User::where('id', $availableUserId )->pluck('name');
					$result['availableUserArray'][] = $availableUser; 
				endforeach;
			endif;
			$assignedUser = array();
			if(isset($assignedUsers)):
				foreach($assignedUsers as $assignedUserId):
					$assignedUser['user_id'] = $assignedUserId ;
					$assignedUser['username'] = User::where('id', $assignedUserId )->pluck('name');
					$result['assignedUserArray'][] = $assignedUser; 
				endforeach;
			endif;
			error_log(print_r($result, true));
			return $result;
	}

}
