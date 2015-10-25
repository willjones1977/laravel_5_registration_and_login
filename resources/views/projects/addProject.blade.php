@extends('layouts.wrapper')

@section('content')
	@include('tasks.nav-tasks')
	@include('projects.nav-projects')
	<div style="margin-top: 20px;"><span style="font-size: 1.5em">Add Project</span></div>
	<style type="text/css">
	td{ padding: 3px;}
	</style>
	{!! Form::open(array('url' => 'addProject')) !!}
		<div style="">
		 	<table>
		 		<tr>
		 			<td>Project Name</td>
		 			<td><input type="text" name="projectName"></td>
		 		</tr>
		 		<tr>
		 			<td>Assign Project To (user id)</td>
		 			<td><input type="text" name="project_recipient_id"></td>
		 		</tr>

		 		<tr>
		 			<td>Due Date</td>
		 			<td><input type="date" style="width: 100%" name="projectDueDate"></td>
		 		</tr>
		 	</table>
		 	<div style="margin-top: 10px">
		 		<label>Project Description</label><br>
		 		<textarea name="projectDescription" style="width: 100%; height: 150px;"></textarea>	
		 	</div>
		 	<div>
		    	<button class="btn btn-primary" style="float: right">Add Project</button>
		    	<div style="clear: both"></div>
	    	</div>
		</div>
	{!! Form::close() !!}
	addProject.blade.php
@stop