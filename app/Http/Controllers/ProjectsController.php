<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Projects\Projects;
use App\Tasks\Tasks;
use App\User;

class ProjectsController extends Controller{
	public function showAllUserProjects(){
		$projects = Projects::where('project_completed_date', '0000-00-00 00:00:00')
							->where('project_creators_id', \Auth::user()->id)->paginate(4);

		return view('projects.showProjects')->with('projects', $projects);
	}
	public function showAddProject(){
		return view('projects.addProject');
	} 
	public function addProject(){
		$allInput = \Input::all();
		$project = new Projects;
		$project->project_creators_id  	= \Auth::user()->id;
		$project->project_name 			= \Input::get('projectName');
		$project->project_description	= \Input::get('projectDescription');
		$project->project_created_date	= date('Y-m-d H:i:s');
		$project->project_due_date				= \Input::get('projectDueDate');
		$project->project_recipient_id			= \Input::get('project_recipient_id');
		$project->save();
		return redirect('showProjects');
	}
	public function showProjectSummary($projectId){
		$projectInfo = Projects::where('id', $projectId)->first();
		$projectInfo->project_creator = User::where('id', $projectInfo->project_creators_id)->pluck('name');
		// Get tasks associated with the project
		

		$projectInfo->tasks = Tasks::where('project_id', $projectId )
								   ->where('completed_date_time', '0000-00-00 00:00:00')->paginate(2);


		// The add task feature of the Project Summary needs a list of the users .. so get a list of the users
		$users = User::all(['id', 'name']);
		$users = $users->toArray();
		$users = json_encode($users);
		return view('projects.projectSummary')->with('projectInfo', $projectInfo)
											  ->with('users', $users);		
	}
}