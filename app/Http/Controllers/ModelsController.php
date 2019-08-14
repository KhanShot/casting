<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Casting_model;
use Auth;
use Illuminate\Support\Facades\Input;
use App\page_Model;
use App\Projects;
use Illuminate\Support\Facades\DB;


?> <?php global $count;  ?>   <?php
class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function datatable(){
        //$models = Casting_model::orderBy('id', 'DESC');;
        $projects = Projects::all()->groupBy('project_id');
        $models = DB::table('casting_models')->orderBy('id', 'desc')->get();
        
        return view('admin.datatable', compact('models', 'projects'));
    }
    public function index(){
        if(Auth::check()){
            $pages = DB::table('formedpage')->distinct('page_id')->count('page_id');
            
            $models = Casting_model::get()->count();
            return view('admin.index', compact('models', 'pages'));
        }
        else{
            return redirect('login');
        }
    }
    public function create(){
        if(Auth::check()){
            
            return view('admin.create');    
        }
        else{
            return redirect('login');
        }
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $model = $this->validate(request(), [
            'model_type'=>'required',
            'name' => 'required',
            'surname' => 'required',
            'fathersname' => 'required',
            'email' => 'required',
            'social_acc' => 'required',
            'phone' => 'required',
            'pasport' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'can_go_abroad' => 'required',
            'age' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'body' => 'required',
            'clothes_size' => 'required',
            'foot_size' => 'required|numeric',
            'appearance' => 'required',
            'color_hair' => 'required',
            'color_eyes' => 'required',
            'profession' => 'required',
            'current_work' => 'required',
            'skill_sport' => 'required',
            'skill_fight_art' => 'required',
            'skill_dance' => 'required',
            'skill_instrumental' => 'required',
            'skill_vocal' => 'required',
            'skill_car_ride' => 'required',
            'skill_horse_ride' => 'required',
            'skill_else' => 'required',
            'languages' => 'required',
            'job_experience_tv' => 'required',
            'job_experience_teatr' => 'required',
            'about_you' => 'required',
            'can_naked' => 'required',
            'have_work' => 'required',
            'will_work' => 'required',
            
            'images' => 'required',
            'videos' => 'required'
        ]);
        //sport
        $skill_sport = "";

        $sports = $request->input('skill_sport');
        $sportsvoi = $request->input('skill_sport1');
        foreach($sports as $sport){
            $skill_sport =$skill_sport." ". $sport.",";
        }
        if($sportsvoi){
            $skill_sport= $skill_sport ." ". $sportsvoi;
        }
        //fight
        $skill_fight_art = "";
        $skill_fights = $request->input('skill_fight_art');
        $skill_fightsvoi = $request->input('skill_fight_art1');

        foreach($skill_fights as $fight){
            $skill_fight_art =$skill_fight_art." ". $fight.",";
        }
        if($skill_fightsvoi){
            $skill_fight_art= $skill_fight_art ." ". $skill_fightsvoi;
        }

        //dance
        $skill_dances = $request->input('skill_dance');
        $skill_dancesvoi = $request->input('skill_dance1');
        $final_dance = "";
        foreach($skill_dances as $dance){
            $final_dance =$final_dance." ". $dance.",";
        }
        if($skill_dancesvoi){
            $final_dance= $final_dance ." ". $skill_dancesvoi;
        }

         //skill_instrumental
        $skill_instrumentals = $request->input('skill_instrumental');
        $instrument_svoi = $request->input('skill_instrumental1');
        $final_intrument = "";
        foreach($skill_instrumentals as $instrument){
            $final_intrument =$final_intrument." ". $instrument.",";
        }
        if($instrument_svoi){
            $final_intrument= $final_intrument ." ". $instrument_svoi;
        }
         //skill_car_ride
        $skill_car_rides = $request->input('skill_car_ride');
        $final_car = "";

        foreach($skill_car_rides as $car_ride){
            $final_car =$final_car." ". $car_ride.",";
        }
        //have_work
        $have_works = $request->input('have_work');
        $final_work = "";

        foreach($have_works as $work){
            $final_work =$final_work." ". $work.",";
        }
        //will_work
        $will_works = $request->input('will_work');
        $final_willwork = "";

        foreach($will_works as $willwork){
            $final_willwork =$final_willwork." ". $willwork.",";
        }
       $video = $request->videos;
        $videoName = "";
        $videosArr=array();
        if ($video) {
            foreach ($video as $videos) {
                $videoName = $videos->getClientOriginalName();
                $videos->move('images',$videoName);
                $videosArr[] =$videoName;
            }
          
        }
        $image = $request->images;
        $imageName ="";
        $imagesArr=array();
        if ($image) {
            foreach ($image as $images) {
                $imageName = $images->getClientOriginalName();
                $images->move('images',$imageName);
                $imagesArr[] =$imageName;
            }
          
        }
        $dataImages = serialize($imagesArr);
        $dataVideos = serialize($videosArr);
        $model['skill_sport'] = $skill_sport;
        $model['skill_fight_art'] = $skill_fight_art;
        $model['skill_dance'] = $final_dance;
        $model['skill_instrumental'] = $final_intrument;
        $model['skill_car_ride'] = $final_car;
        $model['have_work'] = $final_work;
        $model['will_work'] = $final_willwork;
        $model['images'] = $dataImages;
        $model['videos'] = $dataVideos; 
        $model['fill_date'] = '2019/05/25';
        Casting_model::create($model);
        return back()->with('success', 'Модель успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        if(Auth::check()){
            $model = Casting_model::find($id);
            return view('admin.editmodel', compact('model'));        
        }
        else{
            return redirect('login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $model = Casting_model::find($id);
        $this->validate(request(), [
            'model_type'=>'required',
            'name' => 'required',
            'surname' => 'required',
            'fathersname' => 'required',
            'email' => 'required',
            'social_acc' => 'required',
            'phone' => 'required',
            'pasport' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'can_go_abroad' => 'required',
            'age' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'body' => 'required',
            'clothes_size' => 'required',
            'foot_size' => 'required|numeric',
            'appearance' => 'required',
            'color_hair' => 'required',
            'color_eyes' => 'required',
            'profession' => 'required',
            'current_work' => 'required',
            'skill_sport' => 'required',
            'skill_fight_art' => 'required',
            'skill_dance' => 'required',
            'skill_instrumental' => 'required',
            'skill_vocal' => 'required',
            'skill_car_ride' => 'required',
            'skill_horse_ride' => 'required',
            'skill_else' => 'required',
            'languages' => 'required',
            'job_experience_tv' => 'required',
            'job_experience_teatr' => 'required',
            'about_you' => 'required',
            'can_naked' => 'required',
            'have_work' => 'required',
            'will_work' => 'required',
            
        ]);
        //sport
        $skill_sport = "";

        $sports = $request->input('skill_sport');
        $sportsvoi = $request->input('skill_sport1');
        foreach($sports as $sport){
            $skill_sport =$skill_sport." ". $sport.",";
        }
        if($sportsvoi){
            $skill_sport= $skill_sport ." ". $sportsvoi;
        }
        //fight
        $skill_fight_art = "";
        $skill_fights = $request->input('skill_fight_art');
        $skill_fightsvoi = $request->input('skill_fight_art1');

        foreach($skill_fights as $fight){
            $skill_fight_art =$skill_fight_art." ". $fight.",";
        }
        if($skill_fightsvoi){
            $skill_fight_art= $skill_fight_art ." ". $skill_fightsvoi;
        }

        //dance
        $skill_dances = $request->input('skill_dance');
        $skill_dancesvoi = $request->input('skill_dance1');
        $final_dance = "";
        foreach($skill_dances as $dance){
            $final_dance =$final_dance." ". $dance.",";
        }
        if($skill_dancesvoi){
            $final_dance= $final_dance ." ". $skill_dancesvoi;
        }

         //skill_instrumental
        $skill_instrumentals = $request->input('skill_instrumental');
        $instrument_svoi = $request->input('skill_instrumental1');
        $final_intrument = "";
        foreach($skill_instrumentals as $instrument){
            $final_intrument =$final_intrument." ". $instrument.",";
        }
        if($instrument_svoi){
            $final_intrument= $final_intrument ." ". $instrument_svoi;
        }
         //skill_car_ride
        $skill_car_rides = $request->input('skill_car_ride');
        $final_car = "";

        foreach($skill_car_rides as $car_ride){
            $final_car =$final_car." ". $car_ride.",";
        }
        //have_work
        $have_works = $request->input('have_work');
        $final_work = "";

        foreach($have_works as $work){
            $final_work =$final_work." ". $work.",";
        }
        //will_work
        $will_works = $request->input('will_work');
        $final_willwork = "";

        foreach($will_works as $willwork){
            $final_willwork =$final_willwork." ". $willwork.",";
        }
        
        if (null !== ($request->input('videos'))) {
            return "nosdgsdgas'fgons'd664646";
        }

        
        
        if($request->videos == ""){
            $dataVideos = $request->videos_alt;
            $model->videos = $dataVideos;
            
        }
        else{
            $video = $request->videos;
            $videoName = "";
            $videosArr=array();
            if ($video) {
                foreach ($video as $videos) {
                    $videoName = $videos->getClientOriginalName();
                    $videos->move('images',$videoName);
                    $videosArr[] =$videoName;
                }
            }
            $dataVideos = serialize($videosArr);
            $model->videos = $dataVideos;
        }
        
        if ($request->images == "") {
            $dataImages = $request->images_alt;
            $model->images = $dataImages;
        }
        else{
            $image = $request->images;
            $imageName ="";
            $imagesArr=array();
            if ($image) {
                foreach ($image as $images) {
                    $imageName = $images->getClientOriginalName();
                    $images->move('images',$imageName);
                    $imagesArr[] =$imageName;
                }
            }
            $dataImages = serialize($imagesArr);
            $model->images = $dataImages;
        } 
        $model->name = $request->get('name');
        $model->surname = $request->get('surname');
        $model->fathersname = $request->get('fathersname');
        $model->email = $request->get('email');
        $model->social_acc = $request->get('social_acc');
        $model->phone = $request->get('phone');
        $model->pasport = $request->get('pasport');
        $model->can_go_abroad = $request->get('can_go_abroad');
        $model->age = $request->get('age');
        $model->height = $request->get('height');
        $model->weight = $request->get('weight');
        $model->clothes_size = $request->get('clothes_size');
        $model->foot_size = $request->get('foot_size');
        $model->appearance = $request->get('appearance');
        $model->color_hair = $request->get('color_hair');
        $model->profession = $request->get('profession');
        $model->current_work = $request->get('current_work');
        $model->skill_sport =  $skill_sport;
        $model->skill_fight_art = $skill_fight_art;
        $model->skill_dance = $final_dance;
        $model->skill_instrumental = $final_intrument;
        $model->skill_vocal = $request->get('skill_vocal');
        $model->skill_car_ride = $final_car;
        $model->skill_horse_ride = $request->get('skill_horse_ride');
        $model->skill_else = $request->get('skill_else');
        $model->languages = $request->get('languages');
        $model->job_experience_tv = $request->get('job_experience_tv');
        $model->job_experience_teatr = $request->get('job_experience_teatr');
        $model->about_you = $request->get('about_you');
        $model->can_naked = $request->get('can_naked');
        $model->have_work = $final_work;
        $model->will_work = $final_willwork;
        
        


        $model->save();
        return back()->with('success','Модель успешно редактирован!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $model = Casting_model::find($id);
        $model->delete();
        
        return redirect('admin/datatable')->with('success', "успешно удален!");
    }

    public function deleteImage(Request $request, $id){
        $model = Casting_model::find($id);
        $imagea = $request->input('image');
        $imgs = explode( ", ", $request->input('imagess'));
        $images = array();
        foreach ($imgs as $img) {
            if($img == $imagea){
                $imgs = \array_diff($imgs, [$img]);
                echo "success";
            }
        }
        foreach ($imgs as $img) {
            $images[] = $img;
        }
        $dataImages = serialize($images);

        $model->images = $dataImages;
        $model->save();

        return back()->with('success', 'Фото успешно удалена');
    }
    public function deleteVideo(Request $request, $id){
        $model = Casting_model::find($id);
        $videoa = $request->input('video');
        
        $vids = explode( ", ", $request->input('videoss'));
        $videos = array();
        foreach ($vids as $vid) {
            if($vid == $videoa){
                $vids = \array_diff($vids, [$vid]);
                
            }
        }
        foreach ($vids as $vid) {
            $videos[] = $vid;
        }
        $dataVideos = serialize($videos);

        $model->videos = $dataVideos;
        $model->save();

        return back()->with('success', 'Видео успешно удалена');
    }

    public function search(Request $request){
        $name = $request->input('search');
        $models = DB::table('casting_models')->where('name','LIKE','%' . $name . '%')->orWhere('surname','LIKE','%' . $name . '%')->orWhere('fathersname','LIKE','%' . $name . '%')->get();
        return view('admin/search', compact('models'));
    }
    public function advancedSearch(Request $request){
       
        
        $filters = [
            'color_eyes' => Input::get('color_eyes'),
            'color_hair' => Input::get('color_hair'),
            'age_at' => Input::get('age_at'),
            'age_do' => Input::get('age_do'),
            'body' => Input::get('body'),
        ];
        $models = Casting_model::where(function ($query) use ($filters) {
            if ($filters['color_eyes']) {//color_eyes
                if ($filters['color_eyes'] == 'others') {
                    $query->whereNotIn('color_eyes',  array('Карий', 'Карий','Голубой','Болотный','Чёрный'));
                }
                else{
                    $query->where('color_eyes', '=', $filters['color_eyes']);
                }
            }//end color_eyes
            if($filters['color_hair']){// color_hair
                if ($filters['color_hair'] == 'others') {
                    $query->whereNotIn('color_hair',  array('Брюнет', 'Блондин','Рыжий','Шатен','Седой'));
                }
                else{
                    $query->where('color_hair', '=', $filters['color_hair']);
                }
                $query->where('color_hair', '=' ,$filters['color_hair']);
            }//end color_hair
            if($filters['body']){//body
                if ($filters['body'] == 'others') {
                    $query->whereNotIn('body',  array('худой', 'нормальный','атлетический','в теле','полный'));
                }
                else{
                    $query->where('body', '=', $filters['body']);
                }
                $query->where('body', '=' ,$filters['body']);
            }//end body
            if($filters['age_at']){// AGE
                if($filters['age_do']){
                    $query->whereBetween('age',[$filters['age_at'], $filters['age_do']]);
                }
                else{
                    $query->whereBetween('age',[$filters['age_at'], 10000000000 ]);
                }
            }
            elseif (!($filters['age_at']) && ($filters['age_do']) ) {
                $query->whereBetween('age',[0, $filters['age_do'] ]);
            }//END AGEs
        })->get();
        return view('admin/advancedsearch', compact('models'));
    }
}
