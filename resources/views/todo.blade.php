@extends('layouts.wrapper')

@section('content')
    
    <div class="" style="margin-top: 10px;">
        
        <style type="text/css">
        	td{
        		border: 1px solid;
        	}
        </style>


        ** TO DO:
        <ul>
            <li>Polish the blade template <u>layouts/wrapper.blade.php</u></li>
        	<li>Add <strike>bootstrap</strike> and <strike>jQuery</strike> to layouts.wrapper</li>
			<li>Make this todo list dynamic</li>
			<li>Create a partial that will allow me to include a "tasks" menu on task relevant pages</li>
        </ul>
        	<table>
        		<th>Task Creator</th>
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
        
    </div>
@stop
<?php error_log("todo view loaded successfully"); ?>