<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class page_Model extends Model{
	
	public $table = "formedpage";
    protected $fillable = ['page_id','page_name' ,'user_id','name','surname', 'fathersname','age','height', 'weight','appearance','color_hair','color_eyes'];
}
