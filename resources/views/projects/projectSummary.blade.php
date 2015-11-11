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
	        	background-color: #dadada;
	        	border: 1px solid #ccc;
	        	padding: 5px
	    }
		.summaryLabel{
			/*color: #ccc;*/
			font-size: .8em;
		}
		.pagination{
			margin: 0px;
			padding: 0px;
		}
		.addResourceUIDialogClass{

		}
		.ui-dialog-titlebar{display: none }
		
		.edit-task-minimize{
			padding: 2px;
		}
		.edit-task-save{
			float: right;
			padding: 2px;
			color: #337ab7;
		}
		#confirm-assign-user{
			border: 1px solid;
			border-color: #000;
			display: inline-block;
			float: right;
			padding: 2px 2px 2px 2px;
			background-color: #337ab7;
			color: #ffffff;
			cursor: pointer;
			font-size: 10px;

		}
		#cancel-assign-user{
			border: 1px solid;
			border-color: #000;
			display: inline-block;
			float: right;
			padding: 2px 2px 2px 2px;
			background-color: #337ab7;
			color: #ffffff;
			cursor: pointer;
			margin-right: 5px;
			font-size: 10px;
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
		<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
       	<!-- Tasks -->
        <div class="box-header" style="display: inline-block;font-size: 1.2em;">
        	Tasks
        	<div 	id="addTaskButton"
        			class="glyphicon glyphicon-plus" 
        			style="float: right; margin-right: 5px; margin-top: 2px; cursor: pointer" 
        			title="Add Task">
        	</div>
        </div>
        
        <div id="projectTasks" class="box-body" style="">
			<div style="float: right;">
				{!! $projectInfo->tasks->render() !!}
			</div>
			<br>
			<br>

				<?php 	foreach($projectInfo->tasks as $projectTask): ?>
							<div style="">
								
								<!-- Task Resources -->
								<div style="display: inline-block; width: 18%; float: left">
									<div class="taskResourceContainer" data-resource-container='<?=  $projectTask->id; ?>' style="border: 1px solid #ccc; margin-right: 3px; padding: 4px; background-color: #fff;">
										<div style="background-color: #dadada">
											<div style="display: inline-block;">
												<?= $projectTask->task_creater; ?>
											</div>
											<span class='addResource glyphicon glyphicon-edit' data-add-resource-id='<?=  $projectTask->id; ?>' style='float: right; cursor: pointer' ></span>
										</div>
										

										

										<div class="usersAssignedToTask" data-task-id="<?= $projectTask->id; ?>" style="height: 100px; overflow-y: scroll;">
												<?php 	foreach($projectTask->usersAssignedToTask as $taskUser): ?>
															<div class="userAssignedToTask" data-assigned-user-id="<?= $taskUser->user_id; ?>" style="border-bottom: 1px dashed #ccc;">
																<?= $taskUser->userInfo->name; ?>
															</div>
												<?php 	endforeach; ?>
										</div>
									</div>
								</div>
								<!-- Task Info -->
								<div class="taskInfoContainer" data-taskinfoid="<?= $projectTask->id; ?>" style="display: inline-block; border: 1px solid #ccc; width: 80%;  background-color: #FFFFEF; margin-bottom: 10px">
									<!-- Task Header -->		
										<div style=" ">
											<table style="width: 100%;">
												<tr>
													<td style="width: 20%" valign="top">
														<div style="float: left;">
															<?= date('Y-m-d', strtotime($projectTask->due_date_time)); ?>
														</div>
													</td>
													<!-- Edit Bar -->
													<td style="">
														<div class="editBar" data-editbarid="<?= $projectTask->id; ?>" style="background-color: #dadada; width: 100%; margin-bottom: 2px; border: 1px solid #bbb; display: inline-block">
															<span 	class='edit-task-save glyphicon glyphicon-floppy-disk' 
																	data-edit-task-save-id="<?= $projectTask->id; ?>"
																	style="cursor: pointer">
															</span>
															<span 	class="edit-task-minimize glyphicon glyphicon-edit" 
																	data-edit-task-cancel-id="<?= $projectTask->id; ?>"
																	style="cursor: pointer">
															</span>
															<!-- Complete/Cancel Tasks -->
																<!-- Complete -->
																	<div 	class="completeTaskButton" 
										                                          title="Mark Task Complete"
										                                          data-taskid="<?= $projectTask->id; ?>"
										                                          style="display: inline-block; float: right; border: 1px solid #ccc; padding: 0px 3px 0px 3px;"
										                                          >
																		<span class="glyphicon glyphicon-ok" style="color: green;"></span>
																	</div>	
																<!-- Cancel -->
																	<div 	class="completeTaskButton" 
										                                          title="Mark Task Complete"
										                                          data-taskid="<?= $projectTask->id; ?>"
										                                          style="display: inline-block; float: right;  border: 1px solid #ccc; padding: 0px 3px 0px 3px;"
										                                          >
																		<span class="glyphicon glyphicon-remove" style="color: #a94442;"></span>
																	</div>
															<div style="clear: both"></div>
														</div>
														
													</td>
												</tr>
											</table>
										</div>
									<!-- Task Description -->
										<div  class="taskDescriptionContainer" data-taskid="<?= $projectTask->id; ?>" style="margin-left: 20px; margin-bottom: 20px; margin-right: 10px;  min-height: 75px">
											<?= $projectTask->description ?>
										</div>
								</div>
								<div style="clear: both"></div>
							</div>
							<br>
				<?php	endforeach; ?>
        </div>
        <!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= --> 
        <br>
    </div>
    <div class="addResourceUIDialog" style="padding: 0px; background-color: #dadada; border: 1px solid #dadada  ">
    	<div style="margin-bottom: 5px; color: #fff; background-color: #000000; padding-left: 3px; height: 20px">
    		Add/Remove Users

    		<div id="confirm-assign-user">Confirm</div>
    		<div id="cancel-assign-user" style="">Cancel</div>
    		<div style="clear: both"></div>
    	</div>
    	<div class="row" style="margin: 5px; margin: 0px; " >
	    	<!-- Available Users -->
		    	<div class="col-xs-5" style="border: 1px solid #ccc; padding: 0">
			    	Available Users

			    	<select id="availableUsers" class="" style="width: 100%" multiple size="7">
	
			    	</select>
		    		
		    	</div>
	    	<!-- Add/Remove Button -->
		    	<div class="col-xs-2" style="">
		    		<div id="removeUserButton" class="btn btn-sm btn-primary" style="margin-top: 25px; margin-bottom: 5px">
		    			<span class="glyphicon glyphicon-arrow-left"></span>
		    		</div>
		    		<div id="assignUserButton" class="btn btn-sm btn-primary" style="margin-top: 5px">
		    			<span class="glyphicon glyphicon-arrow-right"></span>
		    		</div>
		    	</div>
	    	<!-- Assigned Users -->
	    		Assigned Users
	    		<div class="col-xs-5" style="border: 1px solid #ccc; padding: 0">
			    	<select id="assignedUsers" class="" style="width: 100%" multiple size="7">
			    		
			    	</select>
	    		</div>
    	</div>
    </div>

    <script type="text/javascript">
    	$('.addResourceUIDialog').hide();
    	$('.edit-task-save').hide();

    	var users = '<?= $users; ?>'
    		users = JSON.parse(users);
    	// Resource Modification Stuff ( add/remove user to/from tasks )
    		$("#confirm-assign-user").on('click', function(){
				// Update the `task_users` table.. remove any users not assigned and add any user assigned.
				taskid = $(this).attr('data-task-id');
				// pass users to assign and users to unassign to the task..
				// Get the ids of the users to assign.. and to unassign into an array to pass from the <select>s

				// I am assuming these following arrays will be empty when this function is called
				var assignedUsers 	= [];
				var availableUsers 	= [];
				$("#assignedUsers option").each(function(){
					assignedUsers.push($(this).attr('data-user-id'));
				});
				$("#availableUsers option").each(function(){
					availableUsers.push($(this).attr('data-user-id'));
				});

				$.ajax({
					type: 'POST',
					url:  '../setUsersAssignedAndNotAssigned',
					data: {
						taskid: taskid,
						assignedUsers: assignedUsers,
						availableUsers: availableUsers
					},
					success: function(result){
						console.log(result);
						// Success.. Close the dialog
						$(".addResourceUIDialog").dialog('close');
						// Now populate or remove relevant items from the #usersAssignedToTask element 
    					// <!-- containing div $("#usersAssignedToTask") -->
						// <!-- user div  $("#userAssignedToTask") -->
						$(".usersAssignedToTask").empty();
						// <div class="usersAssignedToTask" data-task-id="93" style="height: 100px; overflow-y: scroll;">
																						// </div>
						window.location.reload();
						// $.each(result.assignedUserArray, function(){
						// 	$(".usersAssignedToTask").append("<div class='usersAssignedToTask'>"+this.username+"</div>");
						// });
						// $.each(assignedUsers, function(i, value){
						

						// 	//console.log(value);
						// 	//console.log( $(".assignedUserOption[data-user-id='"+value+"']").text() );							
						// 	// username = $(".assignedUserOption[data-user-id='"+value+"']").text() ;							
						// 	// console.log(username);
							
						// 	// $.each($(".assignedUserOption"), function(){

						// 	// 	$(".usersAssignedToTask").append("<div>test"+username+"</div>");
						// 	// });


						
							

						// });
						// // Remove relevant items from the #usersAssignedToTask element
						// $.each(availableUsers, function(i, value){
						// 	$(".userAssignedToTask[data-assigned-user-id='"+value+"']").remove();
						// });

					}
				});
			});
			$("#cancel-assign-user").on('click', function(){
				$(".addResourceUIDialog").dialog('close');
			});
    		
    		$("#assignUserButton").on('click', function(){
				// Get the selected items from #availableUsers
				var selectedUsers 		= [];
				var selectedUsersName 	= [];
					$("#availableUsers :selected").each(function(i, selected) {
						selectedUsersName[i] 	= $(selected).text();
						selectedUsers[i] 		= $(selected).attr('data-user-id');
					});
					$.each(selectedUsers, function(i, value){
						// console.log(value);
						$("#availableUsers option[data-user-id='" + value +  "']").remove();
						$("#assignedUsers").append("<option data-user-id='" + value + "' value='" + value+ "'>"  + selectedUsersName[i] + "</option>");
					});
			});
			$("#removeUserButton").on('click', function(){
				var selectedUsers 		= [];
				var selectedUsersName 	= [];
					$("#assignedUsers :selected").each(	function(i, selected) {
						selectedUsersName[i] 	= $(selected).text();
						selectedUsers[i] 		= $(selected).attr('data-user-id');
					});
					$.each(selectedUsers, function(i, value){
						$("#assignedUsers option[data-user-id='" + value +  "']").remove();
						$("#availableUsers").append("<option data-user-id='" + value + "' value='" + value+ "'>"  + selectedUsersName[i] + "</option>");
							
					});		
			});
		
    	$(document).on('click', '.addResource', function(){
    		taskid = $(this).attr('data-add-resource-id');

    		$(".addResourceUIDialog").dialog({
    			modal: true,
    			dialogClass: 'addResourceUIDialogClass',
    			width: '500px'
    		});
    		// Add or modify the attribute to the #confirm-assign-user button that indicates the task id.
    			$( "#confirm-assign-user" ).attr( "data-task-id", taskid );
    		// Populate the availableUsers and assigned users dialogs with users assigned to the task
    		$.ajax({
    			type: 'POST',
    			url: '../getUsersAssignedAndNotAssigned',
    			data: {
    				taskid: taskid
    			},
    			success: function(users){
					// Populate the #availableUsers and the #assignedUsers <select>s
    				// First remove any options in the #availableUsers and #assignedUsers <selects>
    					$("#availableUsers").find('option').remove();	
    					$("#assignedUsers").find('option').remove();	
    				// Populate the <select> with the unassigned users.
    				
    				$.each(users.notAssignedUsers, function(i, notAssignedUser){
    					$("#availableUsers").append("<option class='availableUserOption' value='"+notAssignedUser.id+"' data-user-id='"+notAssignedUser.id+"'>"+notAssignedUser.name+"</option>");
    				});
    				// Now populate the assigned users <select>
	    			$.each(users.assignedUsers, function(i, assignedUser){
    					$("#assignedUsers").append("<option class='assignedUserOption' value='"+assignedUser.user_id+"' data-user-id='"+assignedUser.user_id+"'>"+assignedUser.name+"</option>");
	    			});	
    			}
    		});
    	});
    	// #addTaskButton click event
	    	$("#addTaskButton").on('click', function(){
	    		// If the #addTaskRow element does not exist, create it.
	    		if(! $( "#addTaskRow" ).length){
		    		var markup  = "<div id='addTaskRow' style=''>";
		    		// Add Task Row Header
		    			markup += "<div style=''>";
		    		// Select Task Owner
		    			markup += 		"<div style='display: inline-block;'>";
		    			markup += 			"<select id='taskOwner' style='width: 120px; height: 30px'>";
		    			markup += 				"<option value='<?= Auth::user()->id;  ?>'><?= Auth::user()->name;  ?></option>";
		    									$.each(users, function( id, user ){
						markup +=					"<option value='"+user.id+"' >" + user.name + "</option>";
										    	});
		    			markup += 			"</select>";
		    			markup +=			"<br>";
		    			markup += 		"</div>";
		    		// Due Date // dueDate
		    			// Set the default value for the due date to the current date
		    			markup += 		"<div style='display: inline-block'>";
		    			markup +=			"<input id='dueDate' value='<?= date('Y-m-d'); ?>' type='date' style='height: 30px'>";
		    			markup += 		"</div>";
		    		// Save/Cancel Buttons
		    			markup += 		"<div style='display: inline-block;  float: right'>";
		    			markup +=  			"<button id='saveTaskButton' class='btn btn-xs btn-primary ' style='width: 120px;'>";
		    			markup +=				"<span class='glyphicon glyphicon-plus'></span>&nbsp;Save Task";
		    			markup +=			"</button>";
		    			markup +=			"&nbsp;";
		    			markup +=  			"<button id='cancelButton' class='btn btn-xs'  style='border: 1px solid; width: 100px; margin-top: 2px'>";
		    			markup +=				"<span class='glyphicon glyphicon-remove'></span>&nbsp;Cancel";	
		    			markup +=			"</button>";
		    			markup += 		"</div>";
		    			markup += 	"</div>";
		    			
		    		// Text area
		    			markup += 	"<div>";
		    			markup += 		"<textarea id='taskDescription' style='width: 100%; height: 55px;' ></textarea>"
		    			markup += 	"</div>";
		    			markup += "</div>";
		    			
		    		
		    			$("#projectTasks" ).append(markup);

				}
	    	});
		// Edit Task toggle
		editTaskFlag = true;
		$(".edit-task-minimize").on('click', function(){
			taskid = $(this).attr('data-edit-task-cancel-id');
			// I need to cancel changes if  applicable
			// Change the save icon back to the complete/cancel tasks button	
				$(".edit-task-save[data-edit-task-save-id="+taskid+"]").hide();
				$(".completeTaskButton[data-taskid="+taskid+"]").show();
				$(".completeTaskButton[data-taskid="+taskid+"]").show();
			if(editTaskFlag == false){
				$(".edit-task-minimize[data-edit-task-cancel-id='"+taskid+"']").removeClass('glyphicon-triangle-bottom');
				$(".edit-task-minimize[data-edit-task-cancel-id='"+taskid+"']").addClass('glyphicon-edit');
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").attr('contenteditable', false);
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").css('border', 'none')
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").css('background-color', '#FFFFEF');
				editTaskFlag = true;
			}else{
				// glyphicon-triangle-bottom
				$(".edit-task-minimize[data-edit-task-cancel-id='"+taskid+"']").removeClass('glyphicon-edit');
				$(".edit-task-minimize[data-edit-task-cancel-id='"+taskid+"']").addClass('glyphicon-triangle-bottom');
				
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").attr('contenteditable', true);
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").css('border', '1px solid');
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").css('border-color', '#337ab7');
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").css('background-color', '#fff');
				$(".taskDescriptionContainer[data-taskid='"+taskid+"']").css('padding', '3px');
				$(".edit-task-save[data-edit-task-save-id="+taskid+"]").show();
				$("[data-editbarid='"+taskid+"']").show();
				$(".completeTaskButton[data-taskid='"+taskid+"']").hide();
				editTaskFlag = false;			
			}
		});
		// Save Task
			$(document).on('click', '#saveTaskButton', function(){
				// Get all of the variables and ajax it..
				project			= '<?= $projectInfo->id ?>';		
				taskRecipient	= $("#taskOwner option:selected").text();
				taskDescription	= $("#taskDescription").val();
				dueDate			= $("#dueDate").val();
				$.ajax({
					type: 'POST',
					url: '../saveProjectTask',
					data: {
						taskRecipient: 		taskRecipient,
						taskDescription: 	taskDescription,
						project: 			project,		
						dueDate: 			dueDate
					},
					// the success function needs the id of the newly created task
					success: function(newTask){
						//alert();
						// Remove the #addTaskRow element 
						$('#addTaskRow').remove();
						// Now add a <tr> that reflects the newly created task						
						alert(newTask.id);
						var markup   = "<div class='taskInfoContainer' data-taskinfoid='"+ newTask.id+"' style=''>";
							// Task Header
							markup	+=		"<div style=''>";
							markup	+=			"<table style='width: 100%;'>"
							markup	+=				"<tr>";
							markup	+=					"<td style='width: 20%'>";
															//
							markup	+=						"<div style='display: inline-block;'>";
							markup	+=							newTask.task_recipient + "&nbsp";
							markup	+= 							newTask.due_date_time;
							markup	+=						"</div>";
							markup	+=					"</td>";
							markup	+=					"<td style=''>";
															// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
															// Edit Bar
																markup 	+= "<div class='editBar' data-editbarid='"+newTask.id+"' style='width: 100%; margin-bottom: 2px; border: 1px solid #bbb; display: inline-block; display: none'>";
																markup 	+= 		"<span style='float: right; padding: 2px;' class='glyphicon glyphicon-floppy-saved'></span>";
																markup 	+= 		"<span style=' padding: 2px' class='glyphicon glyphicon-triangle-bottom'></span>";
																markup 	+= 		"<div style='clear: both'></div>";
																markup 	+= "</div>";
															// Complete/Cancel Tasks
																// Complete
																markup += "<div 	class='completeTaskButton' ";
															    markup += "            title='Mark Task Complete'";
															    markup += "            data-taskid='"+newTask.id+"'";
															    markup += "            style='display: inline-block; float: right'";
															    markup += "            >";
																markup += "		<span class='glyphicon glyphicon-ok' style='color: green;'></span>";
																markup += "</div>	";
																// Cancel
																markup += "<div 	class='completeTaskButton' ";
															    markup += "            title='Mark Task Complete'";
															    markup += "            data-taskid='"+newTask.id+"'";
															    markup += "            style='display: inline-block; float: right'";
															    markup += "            >";
																markup += "		<span class='glyphicon glyphicon-remove' style='color: #a94442;'></span>";
																markup += "</div>";
															// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
							markup	+=					"</td>";
							markup	+=				"</tr>";
							markup	+=			"</table>"
							markup	+=		"</div>";
							// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
							// Task Description
							markup += 		"<div  class='taskDescriptionContainer' data-taskid='"+newTask.id+"' style='margin-left: 20px; margin-bottom: 20px'>";
							markup += 			newTask.description;
							markup += 		"</div>";
							// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

							markup	+=	"</div>";
						
						$(".editBar").hide();
						$("#projectTasks" ).append(markup);
					}
				});
			})
    	// Cancel Button Click
	    	$(document).on('click', '#cancelButton', function(){
	    		// Remove the created table row
	 			$('#addTaskRow').remove();
	    	});
    	// .completeTaskButton click event
	    	$(document).on('click', '.completeTaskButton', function(){
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