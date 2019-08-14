<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comments extends Model{
	
    public $table = "comments";
    protected $fillable = ['user_id','name','comment_text'];
}
