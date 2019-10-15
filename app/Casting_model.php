<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Casting_model extends Model{
    protected $fillable = ['name','surname', 'admin_comment','city','gender','address', 'fathersname', 'model_type','email','social_acc', 'illness', 'allergy','food_prefer', 'phone','pasport','can_go_abroad','age','height', 'weight','body','clothes_size',	'foot_size','appearance','color_hair','color_eyes',	'profession','current_work','skill_sport',	'skill_fight_art',	'skill_dance','skill_instrumental',	'skill_vocal',	'skill_car_ride','skill_horse_ride','skill_else','languages','job_experience_tv','job_experience_teatr','about_you','can_naked',	'have_work','will_work','fill_date','images','videos'];
}
