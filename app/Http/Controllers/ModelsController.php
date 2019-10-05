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
class ModelsController extends Controller{

    public function datatable(){
        //$models = Casting_model::orderBy('id', 'DESC');;
        if (Auth::check()) {
            $projects = Projects::all()->groupBy('project_id');
            $models = DB::table('casting_models')->orderBy('id', 'desc')->get();
            return view('admin.datatable', compact('models', 'projects'));
        }
        return abort(404);
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
        $model = array(
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'fathersname' => $request->input('fathersname'),
            'model_type'=>$request->input('model_type'),
            'email' => $request->input('email'),
            'social_acc' => $request->input('social_acc'),
            'phone' => $request->input('phone'),
            'pasport' => $request->input('phone'),
            'city' => $request->input('city'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'can_go_abroad' => $request->input('can_go_abroad'),
            'age' => $request->input('age'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'body' => $request->input('body'),
            'clothes_size' => $request->input('clothes_size'),
            'foot_size' => $request->input('foot_size'),
            'appearance' => $request->input('appearance'),
            'color_hair' => $request->input('color_hair'),
            'color_eyes' => $request->input('color_eyes'),
            'profession' => $request->input('profession'),
            'current_work' => $request->input('current_work'),
            'skill_sport' => $request->input('skill_sport'),
            'skill_fight_art' => $request->input('skill_fight_art'),
            'skill_dance' => $request->input('skill_dance'),
            'skill_instrumental' => $request->input('skill_instrumental'),
            'skill_vocal' => $request->input('skill_vocal'),
            'skill_car_ride' => $request->input('skill_car_ride'),
            'skill_horse_ride' => $request->input('skill_horse_ride'),
            'skill_else' => $request->input('skill_else'),
            'languages' => $request->input('languages'),
            'job_experience_tv' => $request->input('job_experience_tv'),
            'job_experience_teatr' => $request->input('job_experience_teatr'),
            'about_you' => $request->input('about_you'),
            'can_naked' => $request->input('can_naked'),
            'have_work' => $request->input('have_work'),
            'will_work' => $request->input('will_work'),
            'images' => $request->input('images'),
            'videos' => $request->input('videos')
        );
        $SocArr = array();

        if($request->input('socc_vk') && $request->input('socc_vk') != "vk.com/"){
            $SocArr[] = $request->input('socc_vk');
        }
        if($request->input('socc_insta') && $request->input('socc_insta') != "instagram.com/"){
            $SocArr[] = $request->input('socc_insta');
        }
        if($request->input('socc_ano')){
            $SocArr[] = $request->input('socc_ano');
        }
        
        //sport
        $skill_sport = "";

        $sports = $request->input('skill_sport');
        $sportsvoi = $request->input('skill_sport1');
        if($sports){
            foreach($sports as $sport){
                $skill_sport =$skill_sport." ". $sport.",";
            }
            if($sportsvoi){
                $skill_sport= $skill_sport ." ". $sportsvoi;
            }
        }
        //fight
        $skill_fight_art = "";
        $skill_fights = $request->input('skill_fight_art');
        $skill_fightsvoi = $request->input('skill_fight_art1');
        if($skill_fights){
            foreach($skill_fights as $fight){
                $skill_fight_art =$skill_fight_art." ". $fight.",";
            }
        }

        if($skill_fightsvoi){
            $skill_fight_art= $skill_fight_art ." ". $skill_fightsvoi;
        }
        

        //dance
        $skill_dances = $request->input('skill_dance');
        $skill_dancesvoi = $request->input('skill_dance1');
        $final_dance = "";
        if($skill_dances){
            foreach($skill_dances as $dance){
                $final_dance =$final_dance." ". $dance.",";
            }
        }
        if($skill_dancesvoi){
            $final_dance= $final_dance ." ". $skill_dancesvoi;
        }

         //skill_instrumental
        $skill_instrumentals = $request->input('skill_instrumental');
        $instrument_svoi = $request->input('skill_instrumental1');
        $final_intrument = "";
        if($skill_instrumentals){
            foreach($skill_instrumentals as $instrument){
                $final_intrument =$final_intrument." ". $instrument.",";
            }
        }
        if($instrument_svoi){
            $final_intrument= $final_intrument ." ". $instrument_svoi;
        }
         //skill_car_ride
        $skill_car_rides = $request->input('skill_car_ride');
        $final_car = "";
        $skill_car_svoi = $request->input('skill_car_ride1');
        if($skill_car_rides){
            foreach($skill_car_rides as $car_ride){
                $final_car =$final_car." ". $car_ride.",";
            }
        }
        if ($skill_car_svoi) {
            $final_car = $final_car . $skill_car_svoi; 
        }

        //have_work
        $have_works = $request->input('have_work');
        $final_work = "";
        if ($have_works) {
            foreach($have_works as $work){
                $final_work =$final_work." ". $work.",";
            }
        }
        //will_work
        $will_works = $request->input('will_work');
        $final_willwork = "";
        if ($will_works) {
            foreach($will_works as $willwork){
                $final_willwork =$final_willwork." ". $willwork.",";
            }
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
        if (!$video) {
            $videosArr[] ="default.mp4";
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
        if (!$image) {
            $imagesArr[] ="default.jpg";
        }



        if ($request->input('food_prefer')) {
            $model['food_prefer'] = $request->input('food_prefer');
        }
        if ($request->input('allergy')) {
            $model['allergy'] = $request->input('allergy');
        }
        if ($request->input('illness')) {
            $model['illness'] = $request->input('illness');
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
        $model['social_acc'] = serialize($SocArr);
        if (Auth::check()) {
            Casting_model::create($model);
            return back()->with('success', 'Модель успешно добавлен!');
        }
        else{
            return abort(404);
        }
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
   
        //sport
        $skill_sport = "";

        $sports = $request->input('skill_sport');
        $sportsvoi = $request->input('skill_sport1');
        if ($sports) {
            foreach($sports as $sport){
                $skill_sport =$skill_sport." ". $sport.",";
            }
        }
        if($sportsvoi){
            $skill_sport= $skill_sport ." ". $sportsvoi;
        }
        //fight
        $skill_fight_art = "";
        $skill_fights = $request->input('skill_fight_art');

        $skill_fightsvoi = $request->input('skill_fight_art1');
        if ($skill_fights) {
            foreach($skill_fights as $fight){
                $skill_fight_art =$skill_fight_art." ". $fight.",";
            }
        }
        if($skill_fightsvoi){
            $skill_fight_art= $skill_fight_art ." ". $skill_fightsvoi;
        }

        //dance
        $skill_dances = $request->input('skill_dance');
        $skill_dancesvoi = $request->input('skill_dance1');
        $final_dance = "";
        if ($skill_dances) {
            foreach($skill_dances as $dance){
                $final_dance =$final_dance." ". $dance.",";
            }
        }
        if($skill_dancesvoi){
            $final_dance= $final_dance ." ". $skill_dancesvoi;
        }

         //skill_instrumental
        $skill_instrumentals = $request->input('skill_instrumental');
        $instrument_svoi = $request->input('skill_instrumental1');
        $final_intrument = "";
        if ($skill_instrumentals) {
            foreach($skill_instrumentals as $instrument){
                $final_intrument =$final_intrument." ". $instrument.",";
            }
        }
        if($instrument_svoi){
            $final_intrument= $final_intrument ." ". $instrument_svoi;
        }
         //skill_car_ride
        $skill_car_rides = $request->input('skill_car_ride');
        $final_car = "";
        if ($skill_car_rides) {
            foreach($skill_car_rides as $car_ride){
                $final_car =$final_car." ". $car_ride.",";
            }
        }
        //have_work
        $have_works = $request->input('have_work');
        $final_work = "";
        if ($have_works) {
            foreach($have_works as $work){
                $final_work =$final_work." ". $work.",";
            }
        }
        //will_work
        $will_works = $request->input('will_work');
        $final_willwork = "";
        if ($will_works) {
            foreach($will_works as $willwork){
                $final_willwork =$final_willwork." ". $willwork.",";
            }
        }
        
        
        $videosArr=array();
        if ($request->videos=="") {
            $videosm = unserialize($model->videos);
            foreach ($videosm as $vidm) {
                $videosArr[] = $vidm;
            }
           
        }
        else{
            $video = $request->videos;
            $videoName ="";
            $videosm = unserialize($model->videos);
            foreach ($videosm as $vidm) {
                $videosArr[] = $vidm;
            }
            foreach ($video as $videos) {
                
                $videoName = $videos->getClientOriginalName();
                $videos->move('images',$videoName);
                $videosArr[] =$videoName;
            }
            $dataVideos = serialize($videosArr);
            $model->videos = $dataVideos;
        }
        

        $imagesArr=array();
        if ($request->images=="") {
            $imagem = unserialize($model->images);
            foreach ($imagem as $imgm) {
                $imagesArr[] = $imgm;
            }
           
        }
        else{
            $image = $request->images;
            $imageName ="";
            $imagem = unserialize($model->images);
            foreach ($imagem as $imgm) {
                $imagesArr[] = $imgm;
            }
            foreach ($image as $images) {
                
                $imageName = $images->getClientOriginalName();
                $images->move('images',$imageName);
                $imagesArr[] =$imageName;
            }
            
            $dataImages = serialize($imagesArr);
            $model->images = $dataImages;
        }
        
        if ($request->input('food_prefer')) {
            $model->food_prefer = $request->input('food_prefer');
        }
        if ($request->input('allergy')) {
            $model->allergy = $request->input('allergy');
        }
        if ($request->input('illness')) {
            $model->illness = $request->input('illness');
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
        
        
        if (Auth::check()) {
            $model->save();
            return back()->with('success','Модель успешно редактирован!');
        }
        else{
            return abort(404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::check()) {
            $model = Casting_model::find($id);
            $model->delete();
            return redirect('admin/datatable')->with('success', "успешно удален!");
        }
        else{
            return abort(404);
        }
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
       $projects = Projects::all()->groupBy('project_id');
        
        $filters = [
            'color_eyes' => Input::get('color_eyes'),
            'color_hair' => Input::get('color_hair'),
            'model_type' => Input::get('model_type'),
            'gender' => Input::get('gender'),
            'age_at' => Input::get('age_at'),
            'age_do' => Input::get('age_do'),
            'height_at' => Input::get('height_at'),
            'height_do' => Input::get('height_do'),
            'body' => Input::get('body'),
            'hashtag' =>input::get('hashtag'),
        ];
        $modelss = Casting_model::where(function ($query) use ($filters) {
            if ($filters['color_eyes']) {//color_eyes
                if ($filters['color_eyes'] == 'others') {
                    $query->whereNotIn('color_eyes',  array('Карий', 'Карий','Голубой','Болотный','Чёрный'));
                }
                else{
                    $query->where('color_eyes', '=', $filters['color_eyes']);
                }
            }//end color_eyes
            if ($filters['model_type']) {//model_type
                $query->where('model_type', '=', $filters['model_type']);
            }//end model_type

            if ($filters['gender']) { //gender
                $query->where('gender', '=', $filters['gender'] );
            }//end gender

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
             if($filters['height_at']){// AGE
                if($filters['height_do']){
                    $query->whereBetween('height',[$filters['height_at'], $filters['height_do']]);
                }
                else{
                    $query->whereBetween('height',[$filters['height_at'], 10000000000 ]);
                }
            }
            elseif (!($filters['height_at']) && ($filters['height_do']) ) {
                $query->whereBetween('height',[0, $filters['height_do'] ]);
            }//END AGEs

            if($filters['hashtag']){
                $query->where('name','LIKE','%' . $filters['hashtag'] . '%')->orWhere('surname','LIKE','%' . $filters['hashtag'] . '%')->orWhere('fathersname','LIKE','%' . $filters['hashtag'] . '%')->orWhere('city','LIKE','%' . $filters['hashtag'] . '%')->orWhere('address','LIKE','%' . $filters['hashtag'] . '%')->orWhere('body','LIKE','%' . $filters['hashtag'] . '%')->orWhere('appearance','LIKE','%' . $filters['hashtag'] . '%')->orWhere('current_work','LIKE','%' . $filters['hashtag'] . '%')->orWhere('profession','LIKE','%' . $filters['hashtag'] . '%')->orWhere('skill_sport','LIKE','%' . $filters['hashtag'] . '%')->orWhere('skill_fight_art','LIKE','%' . $filters['hashtag'] . '%')->orWhere('skill_dance','LIKE','%' . $filters['hashtag'] . '%')->orWhere('skill_instrumental','LIKE','%' . $filters['hashtag'] . '%')->orWhere('skill_vocal','LIKE','%' . $filters['hashtag'] . '%')->orWhere('skill_else','LIKE','%' . $filters['hashtag'] . '%')->orWhere('languages','LIKE','%' . $filters['hashtag'] . '%')->orWhere('about_you','LIKE','%' . $filters['hashtag'] . '%');
            }
        })->get();

        $string = " " ; 
        return view('admin/advancedsearch', compact('modelss','projects'))->with('msg', 'Поиск: ');
    }
    public function count(){
        return "helomthfck";
    }
}
