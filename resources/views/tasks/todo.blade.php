@extends('layouts.wrapper')

@section('content')
     @include('tasks.nav-tasks')
    <div class="" style="margin-top: 10px;">
        
        <style type="text/css">
        	th{
                padding-left: 3px;
                padding-right: 3px;
            }
            td{
        		border: 1px solid #ccc;
                padding-left: 3px;
                padding-right: 3px;
        	}
        </style>


        <span style="font-size: 1.5em">TO DO:</span>
        	<table>
        		<th>From</th>
        		<th>Description</th>
        		<th>Due Date/Time</th>
	        	<?php 	foreach($tasks as $task):  ?> 
        					<tr>
	        					<td><?= $task['task_creater']; ?></td>
        						<td><?= $task['description']; ?></td>
        						<td><?= $task['due_date_time']; ?></td>
        						<td></td>
        					</tr>
	        				
	        	<?php 	endforeach; ?> 
        	</table>
        <pre style="margin-top: 10px">tasks/todo.blade.php</pre>
    </div>
@stop
<?php error_log("todo view loaded successfully"); ?>