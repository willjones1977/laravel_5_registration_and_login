@extends('layouts.wrapper')

@section('content')
    @include('tasks.nav-tasks')
	<div style="margin-top: 20px;"><span style="font-size: 1.5em">Add Task</span></div>
	{!! Form::open(array('url' => 'addTask')) !!}
	    <div class="" style="margin-top: 20px;">
			<table>
				<tr>
					<!-- Task Recipient -->
					<td style="padding: 3px;">Task Recipient&nbsp;</td>
					<td style="padding: 3px;">
						<input type="text" name="taskRecipient">
					</td>
				</tr>

				<tr>
					<!-- Due Date -->
					<td style="padding: 3px;">Due Date&nbsp;</td>
					<td style="padding: 3px;">
						<input type="date" style="width: 100%" name="dueDate">
					</td>
			</table>        
	    </div>
	    <div style="margin-top: 10px;">
			<label>Task Description</label><br>
			<textarea name="taskDescription" style=" width: 100%; height: 150px;"></textarea>
	    </div>
	    <div>
	    	<button class="btn btn-primary" style="float: right">Add Task</button>
	    	<div style="clear: both"></div>
	    </div>
	{!! Form::close() !!}
        
@stop
