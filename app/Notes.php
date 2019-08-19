<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model{
    public $table = "notes";
    protected $fillable = ['project_id','page_id','user_id', 'rezh_rate', 'produser_rate', 'client_rate','comment'];
}
