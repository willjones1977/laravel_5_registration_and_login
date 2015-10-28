<?php
namespace App\Projects;
use Illuminate\Database\Eloquent\Model;
class Projects extends Model{
	protected $table = "projects";
	public $timestamps = false;

	public function user(){
		return $this->hasOne('App\User', 'id', 'project_creators_id');
	}
}