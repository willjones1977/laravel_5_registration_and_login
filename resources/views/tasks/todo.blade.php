@extends('layouts.wrapper')

@section('content')
     @include('tasks.nav-tasks')
    <div class="" style="margin-top: 10px;">
        
        <style type="text/css">
        	th{
                padding: 6px;
            }
            td{
        		/*border: 1px solid #ccc;*/
                padding-left: 3px;
                padding-right: 3px;
        	}
            div{
              /*  border: 1px dashed;*/
            }
        </style>
        
        <div style="">
            <div style="display: inline-block;font-size: 1.5em;">
                To do:
            </div>
            <div style="display: inline-block; float: right">
            
                {!! $tasks->render() !!}
            </div>
            <div style="clear: both"></div>
        </div>
        <br>
        <div>
            <table style="width: 100%">
                <th><span style="white-space: nowrap">Assigned By</span></th>
                <th>Task</th>
                <th><span style="white-space: nowrap">Due Date/Time</span></th>
                <?php   foreach($tasks as $task):  ?> 
                            <tr style="border-bottom: 1px dashed #ccc">
                                <!-- Task Creater -->
                                    <td valign="top" style="width: 20%">
                                        <?= $task['task_creater']; ?>
                                    </td>
                                <!-- Task Description -->
                                    <td valign="top" style="width: 60%;">
                                        <?= $task['description']; ?></span>
                                    </td>
                                <!-- Task Due Date/Time -->
                                    <td>
                                        <span style="white-space: nowrap"><?= $task['due_date_time']; ?></span>
                                    </td>
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
                <?php   endforeach; ?> 
            </table>
        </div>
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
