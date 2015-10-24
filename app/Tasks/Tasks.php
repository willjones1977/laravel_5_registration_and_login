<?php
namespace App\Tasks;
use Illuminate\Database\Eloquent\Model;
class Tasks extends Model{
	protected $table = "tasks";
	public $timestamps = false;
}