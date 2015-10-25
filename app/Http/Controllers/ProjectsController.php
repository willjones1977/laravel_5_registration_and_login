<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Tasks\Tasks;
class ProjectsController extends Controller{
	public function showAllUserProjects(){
		return view('projects.showProjects');
	} 
}