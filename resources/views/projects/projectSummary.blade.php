@extends('layouts.wrapper')

@section('content')
	@include('tasks.nav-tasks')
	@include('projects.nav-projects')
	<style type="text/css">
	td	{
		border: 1px solid;
	}
	</style>
	<div style="margin-top: 10px;">
		<div style="">
            <div style="display: inline-block;font-size: 1.5em;">
                Project Summary
            </div>
            <div style="display: inline-block; float: right">
				
            </div>
            <div style="clear: both"></div>
        </div>
        <div>
        	<table>
					<tr>
						<td>Project Name</td>
						<td><?=  $projectInfo->project_name; ?></td>
					</tr>
					<tr>
						<td>Created by</td>
						<td><?=  $projectInfo->project_creator; ?></td>
					</tr>
					<tr>
						<td>Created Date</td>
						<td><?=  $projectInfo->project_created_date; ?></td>
						<td>Due Date</td>
						<td><?=  $projectInfo->project_due_date; ?></td>
					</tr>
					<tr>
					</tr>
					<tr>
						<td>Description</td>
						<td><?=  $projectInfo->project_description; ?></td>
					</tr>
				</table>
        </div> 
        <br>
				<pre><?= print_r($projectInfo, true) ?></pre>          
    </div>
@stop