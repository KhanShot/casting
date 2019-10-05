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
use Barryvdh\DomPDF\ServiceProvider;
use PDF;

class CommentsController extends Controller{
    public function store(Request $request){
    	$name = $request->input('name');
    	$comment_text = $request->input('comment_text');
    	$id = $request->input('id');
    	DB::insert('insert into comments (user_id, name, comment_text) values (?, ?, ?)', [$id, $name, $comment_text]);
    	return back()->with('msg', 'comment added');
    }
    public function invoice (){
        $id = 1;
        $model = Casting_model::find($id);
        return view('admin/invoice', compact('model')) ;
    }
    public function detail(Request $request,$id){
    	$model = Casting_model::find($id);
        $project_id = $request->input('qplamznxbcv');
        $page_id = $request->input('mzlapqoweiruty');
        $rezh_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->avg('rezh_rate');
        $produser_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->avg('produser_rate');
        $client_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->avg('client_rate');
        $comments = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->where('comment',"!=", '')->get();
        
    	return view('admin/model', compact('model','project_id','page_id', 'produser_rate','client_rate','rezh_rate','comments'));
    }
    public function detailforadmin($id){
        $model = Casting_model::find($id);
        return view('admin.modelview', compact('model'));
    }
    public function printPDF(Request $request,$id){
        $model = Casting_model::find($id);
        $project_id = $request->input('project_id');
        $page_id = $request->input('page_id');
        $rezh_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->avg('rezh_rate');
        $produser_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->avg('produser_rate');
        $client_rate = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->avg('client_rate');
        $comments = Notes::where('project_id',$project_id)->where('page_id',$page_id)->where('user_id', $model->id)->where('comment',"!=", '')->get();
        
        $pdf = PDF::loadView('admin/invoice',compact('model','project_id','page_id', 'produser_rate','client_rate','rezh_rate','comments'));  
        
        return $pdf->download($model->name.'.pdf');
    }
}
