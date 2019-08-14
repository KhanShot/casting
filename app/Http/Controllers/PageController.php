<?php

namespace App\Http\Controllers;
use Excel;

?> <?php global $count;?>   <?php
use App\Exports\ModelsExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Casting_model;
use App\Projects;
use App\Comments;
use Auth;
use Illuminate\Support\Facades\Input;
use App\page_Model;
use willvincent\Rateable\Rating;
use Illuminate\Support\Facades\DB;
?> <?php $count = 1;?>   <?php

class PageController extends Controller
{
    public function makepage(Request $request){
        $ids = $request->input('ids');
        $pagename= $request->input('pagename');
        $page_ida =  page_Model::max('page_id');
        if (($request->has('pagename'))) {
            if(($request->has('ids'))){
                $page_ida = $page_ida+1;
                foreach ($ids as $id) {
                    // $model = Casting_model::select('name','surname', 'fathersname','age','height', 'weight','appearance','color_hair','color_eyes')->where('id',$id)->get();
                    $model = Casting_model::select('id')->where('id',$id)->get();
                    $name = Casting_model::select('name')->where('id',$id)->get();
                    $name = $name[0]{'name'};
                    $page = array(
                        'page_name' => $pagename,
                        'page_id' => $page_ida, 
                        'user_id' => $model[0]{'id'},
                    );
                    $pages = page_Model::create($page);
                }
                if($request->has('project_name')){
                    $project = Projects::where('project_name',$request->input('project_name'))->first();
                    $data = array(
                        'project_name' => $request->input('project_name'),
                        'page_id' => $page_ida,
                        'project_id'=> $project->project_id,
                    );
                    Projects::create($data);
                }
                $page = page_Model::all()->groupBy('page_id');
                unset($request);
                return redirect('admin/makepage')->with('success', 'successfully created');
            }
        }
        else{
            return back()->with('success','error');
        }
        
    }
    public function pages(){
        $page = page_Model::all()->sortByDesc("created_at")->groupBy('page_id');
        return redirect('admin.makepage', compact('page'));
    }
    public function page($id){
    	$models = DB::table('casting_models')
    	->join('formedpage','formedpage.user_id', "=", 'casting_models.id')
    	->where('formedpage.page_id',$id)
    	->get();
        
        
    	return view('admin.pages', compact('models'));
    }
    public function delete($id){
        $page = page_Model::all()->where("page_id",$id);
        foreach ($page as $pa) {
            $page->each->delete();;
        }
        return back()->with('success', "deleted successfully");
    }
    public function ratingRate(Request $request){
        request()->validate(['rate' => 'required']);
        $model = Casting_model::find($request->id); 
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $model->rating = $model->averageRating;
        if(is_null($model->averageRating)){
            $model->rating = $request->input('rate'); 
        }
        $model->save();
        $model->ratings()->save($rating);
        return back();
    }
    
    public function images(){
        return view('admin.images');    
    }   
}