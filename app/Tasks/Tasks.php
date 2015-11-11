<?php
namespace App\Tasks;
use Illuminate\Database\Eloquent\Model;
class Tasks extends Model{
	protected $table = "tasks";
	public $timestamps = false;


	// Make task users accessible like property relationship function
	public function usersAssignedToTask(){
		return $this->hasMany('App\Tasks\TaskUsers', 'task_id', 'id' );
	}
}