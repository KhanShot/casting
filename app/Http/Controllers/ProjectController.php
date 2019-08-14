<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casting_model;
use App\Projects;
use Auth;
use Illuminate\Support\Facades\Input;
use App\page_Model;
use App\Notes;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller{
    public function index(){
    	$projects = Projects::all()->groupBy('project_id');
    	return view('admin.makepage', compact('projects'));
    }
    public function store(Request $request){
    $project_id =  Projects::max('project_id');
    $project_id = $project_id+1;
    	$project_name = $request->input('project_name');
    	$project = array(
    		'project_id' => $project_id,
    		'project_name' => $project_name,
    	);
    	
    	Projects::create($project);
    	return back()->with('success','created');
    }
    public function projects($id){
    	$projects = DB::table('projects')
    	->join('formedpage','formedpage.page_id', "=", 'projects.page_id')
    	->where('projects.project_id',$id)
    	->get();
    	$models = DB::table('casting_models')
	    ->join('formedpage','formedpage.user_id', "=", 'casting_models.id')
	    ->join('projects','projects.page_id', "=", 'formedpage.page_id')
	    
	    ->where('projects.project_id',$id)
	    ->get();
	    // $user_rate = Notes::where('project_id',$models->project_id)->where('page_id',$models->page_id)->where('user_id', $models->user_id);
	    
	    
    	$projects = $projects->groupBy('page_id');
    	$project_name = Projects::where('projects.project_id',$id)->first();
    	return view('admin/projects', compact('projects','project_name', 'models'));
    }
    public function storeNote(Request $request){
    	$project_id = $request->input('project_id');
    	$page_id = $request->input('page_id');
    	$user_id = $request->input('user_id');
    	if($request->has('user_rate')){
    		$user_rate = $request->input('user_rate');
    	}else{
    		$user_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->avg('user_rate');
    	}

    	if($request->has('comment')){
    		$comment = $request->input('comment');
    	}else{
    		$comment = "";
    	}


    	DB::insert('insert into notes (project_id, page_id, user_id, user_rate, comment) values (?, ?, ?, ?, ?)', [$project_id, $page_id, $user_id, $user_rate,$comment]);
    	return back();
    }
    public function StoreAll(Request $request){
    	return back();
    }
}
