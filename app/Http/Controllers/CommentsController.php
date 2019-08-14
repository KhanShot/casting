<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use willvincent\Rateable\Rating;
use Illuminate\Http\Request;
use App\Casting_model;
use App\Comments;
use Auth;
use Illuminate\Support\Facades\Input;
use App\page_Model;
use App\Notes;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller{
    public function store(Request $request){
    	$name = $request->input('name');
    	$comment_text = $request->input('comment_text');
    	$id = $request->input('id');
    	DB::insert('insert into comments (user_id, name, comment_text) values (?, ?, ?)', [$id, $name, $comment_text]);
    	return back()->with('msg', 'comment added');
    }

    public function detail(Request $request,$id){
        
    	$model = Casting_model::find($id);
    	
        $project_id = $request->input('project_id');
        $page_id = $request->input('page_id');
        $rating = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->avg('user_rate');
        if (is_null($rating)) {
            $rating = 0;
        }
        $comments = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->where('comment',"!=", '')->get();
        $hashed = Hash::make('admin/model');
    	return view('admin/model', compact('model','project_id','page_id', 'rating','comments'));
    }

    
}
