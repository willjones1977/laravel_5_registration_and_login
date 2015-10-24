@extends('layouts.wrapper')

@section('content')
     @include('tasks.nav-tasks')
    <div class="" style="margin-top: 10px;">
        
        <style type="text/css">
        	th{
                padding: 6px;
                /*padding-right: 3px;*/
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
        						<!-- Complete Task Button -->
                                    <td>
                                        <div    class="completeTaskButton" 
                                                title="Mark Task Complete"
                                                data-taskid="<?= $task['id']; ?>"
                                                style=""
                                                >
                                            <span class="glyphicon glyphicon-remove" style="color: #a94442;"></span>
                                        </div>
                                    </td>
        					</tr>
	        	<?php 	endforeach; ?> 
        	</table>
        <pre style="margin-top: 10px">tasks/todo.blade.php</pre>
    </div>
<!-- For Scripts to work.. they need to be inside of the blade template -->
    <script type="text/javascript">
        $(".completeTaskButton").on('click', function(){
            var taskid = $(this).attr('data-taskid');
            $.ajax({
                type:   'POST',
                url:    'markTaskComplete',
                data: { taskid: taskid },
                success: function(taskid){
                    window.location.reload();
                }
            });
        });
    </script>
@stop

<?php error_log("todo view loaded successfully"); ?>