@extends('layouts.wrapper')

@section('content')
	@include('tasks.nav-tasks')
	@include('projects.nav-projects')
	<style type="text/css">
	td	{
		/*border: 1px solid #ccc;*/
		padding: 3px;
		padding-right: 10px;
	}
	.box-header{
		margin-top: 10px;
		display: inline-block;
		padding-left: 10px;
		width: 100%;
		font-size: 1.2em;
		background-color: #000;
		color: #fff
	}
	.box-body{
        	background-color: #fafafa;
        	border: 1px solid #ccc;
        	padding: 5px
    }
	.summaryLabel{
		/*color: #ccc;*/
		font-size: .8em;
	}

	</style>
	<div style="margin-top: 10px;">
		<div style="">
            <div class="box-header" style="">
                Project Summary
            </div>
            <div style="display: inline-block; float: right">
				
            </div>
            <div style="clear: both"></div>
        </div>
        <div id="projectAttributes" class="box-body" style="">
        	<table>
					<tr>
						<td valign="top"><span class="summaryLabel">name</span></td>
						<td valign="top"><?=  $projectInfo->project_name; ?></td>
					</tr>
					<tr>
						<td valign="top"><span class="summaryLabel">created by</span></td>
						<td valign="top"><?=  $projectInfo->project_creator; ?></td>
					</tr>
					<tr>
						<td valign="top">
							<span class="summaryLabel">created</span>
						</td>
						<td valign="top">
							<?=  $projectInfo->project_created_date; ?>
						</td>
						
					</tr>
					<tr>
						<td valign="top">
							<span class="summaryLabel">due</span>
						</td>
						<td valign="top">
							<?=  $projectInfo->project_due_date; ?>
							
						</td>

					</tr>
					<tr>
						<td valign="top"><span class="summaryLabel">description</span></td>
						<td valign="top"><?=  $projectInfo->project_description; ?></td>
					</tr>
			</table>
        </div>
		
        <div class="box-header" style="display: inline-block;font-size: 1.2em;">Tasks</div>
        <div id="projectTasks" class="box-body" style="">
			<table>
				<?php 	foreach($projectInfo->tasks as $projectTask): ?>
							<tr>
								<td valign="top" style="border-bottom: 1px dashed #ccc;">&bull;</td>
								<td valign="top" style="border-bottom: 1px dashed #ccc;"><?= $projectTask->description ?></td>
								<!-- Complete Task Button -->
									<td valign="top" style="border-bottom: 1px dashed #ccc;">
										<div 	class="completeTaskButton" 
	                                            title="Mark Task Complete"
	                                            data-taskid="<?= $projectTask->id; ?>"
	                                            style=""
	                                            >
											<span class="glyphicon glyphicon-remove" style="color: #a94442;"></span>
										</div>	
										
									</td>
								
							</tr>
				<?php	endforeach; ?>
			</table>
        	
        </div> 
        <br>
				<!-- <pre><?//= print_r($projectInfo, true) ?></pre> -->          
    </div>
    <script type="text/javascript">
    	$(".completeTaskButton").on('click', function(){
            var taskid = $(this).attr('data-taskid');
            $.ajax({
                type:   'POST',
                url:    '../markTaskComplete',
                data: { taskid: taskid },
                success: function(taskid){
                    window.location.reload();
                }
            });
        });
    </script>
@stop