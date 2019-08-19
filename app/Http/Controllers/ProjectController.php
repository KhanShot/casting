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

        $projectss = DB::table('projects')
        ->join('formedpage','formedpage.page_id', "=", 'projects.page_id')
        ->get();
       
        $pages = DB::table('formedpage')->distinct('page_id')->count('page_id');
            
        $models = Casting_model::get()->count();



    	return view('admin.makepage', compact('projects', 'projectss'));
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

        //rezh_rate
    	if($request->has('rezh_rate')){
    		$rezh_rate = $request->input('rezh_rate');
    	}else{
    		$rezh_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $user_id)->avg('rezh_rate');
    	}

        //produser_rate
        if($request->has('produser_rate')){
            $produser_rate = $request->input('produser_rate');
        }else{
            $produser_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $user_id)->avg('produser_rate');
        }
        //client rate
        if($request->has('client_rate')){
            $client_rate = $request->input('client_rate');
        }else{
            $client_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $user_id)->avg('client_rate');
        }




    	if($request->has('comment')){
    		$comment = $request->input('comment');
    	}else{
    		$comment = "";
    	}


    	DB::insert('insert into notes (project_id, page_id, user_id, rezh_rate, produser_rate, client_rate, comment) values (?, ?, ?, ?, ?, ?, ?)', [$project_id, $page_id, $user_id, $rezh_rate, $produser_rate, $client_rate, $comment ]);
    	return back();
    }
    public function StoreAll(Request $request){
    	return back();
    }
    public function destroy($name){
        $project = Projects::where('project_name', '=', $name);
        $project->delete();
        
        return back()->with('success', "успешно удален!");
    }
}
