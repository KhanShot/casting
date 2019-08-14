<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model{
    public $table = "notes";
    protected $fillable = ['project_id','page_id','user_id','user_rate','comment'];
}
