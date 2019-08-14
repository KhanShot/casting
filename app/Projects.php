<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model{
    public $table = "projects";
    protected $fillable = ['project_id','page_id' ,'project_name'];
}
