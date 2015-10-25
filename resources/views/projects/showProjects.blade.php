@extends('layouts.wrapper')

@section('content')
	@include('tasks.nav-tasks')
	@include('projects.nav-projects')
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
	<div style="margin-top: 10px;">
		<div style="">
            <div style="display: inline-block;font-size: 1.5em;">
                Projects:
            </div>
            <div style="display: inline-block; float: right">
            
                {!! $projects->render() !!}
            </div>
            <div style="clear: both"></div>
        </div> 
        <br>
        <table style="width: 100%">
                <th><span style="white-space: nowrap">Assigned By</span></th>
                <th>Project</th>
                <th><span style="white-space: nowrap">Due Date/Time</span></th>
                <?php   foreach($projects as $project):  ?> 
                            <tr style="border-bottom: 1px dashed #ccc">
                                <!-- Project Creater -->
                                    <td valign="top" style="width: 20%">
                                        <?= $project['project_creators_id']; ?>
                                    </td>
                                <!-- Project Description -->
                                    <td valign="top" style="width: 60%;">
                                        <span title="Project ID: <?= $project['id']; ?>">
	                                       <a href="showProjectSummary/<?= $project['id']; ?>">
	                                       <!-- //<a href="">test</a>-->
		                                        <?= $project['project_description']; ?>
	                                        </a>
                                        </span>
                                    </td>
                                <!-- Project Due Date/Time -->
                                    <td>
                                        <span style="white-space: nowrap"><?= $project['project_due_date']; ?></span>
                                    </td>
                                <!-- Complete Project Button -->
                                    <td>
                                        <div    class="completeTaskButton" 
                                                title="Mark Project Complete"
                                                data-taskid="<?= $project['id']; ?>"
                                                style=""
                                                >
                                            <span class="glyphicon glyphicon-remove" style="color: #a94442;"></span>
                                        </div>
                                    </td>
                            </tr>
                <?php   endforeach; ?> 
            </table>			
	</div>
showProjects.blade.php
@stop