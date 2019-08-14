<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_model extends Model{
	
    public $table = "categories";
    protected $fillable = ['name'];
}
