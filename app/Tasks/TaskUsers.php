<?php
namespace App\Tasks;
use Illuminate\Database\Eloquent\Model;


class TaskUsers extends Model{
	protected $table = 'task_users';
	public $timestamps = false;

	// Make users accessible like a property with a relationship function
	public function userInfo(){
		return $this->hasOne('App\Users', 'id', 'user_id');
	}
}