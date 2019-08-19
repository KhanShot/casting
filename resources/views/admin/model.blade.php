

@extends('admin.master')
@include('admin.navbar')
@section('content')



<?php  $images = unserialize($model->images);?>
<?php  $videos = unserialize($model->videos);?>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
		
	<div class="first_block ">
		<div class="first_block_first">
		    <div id="slider1_container" style="position: relative; width: 330px;
		        height: 250px; overflow: hidden;">

		        <!-- Loading Screen -->
		        <div data-u="loading" class="jssorl-009-spin" style="" src="../svg/loading/static-svg/spin.svg" />
		        </div>

		        <!-- Slides Container -->
		        <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 330px; height: 250px;
		            overflow: hidden;">
		            @foreach($images as $image)
			            <div>
			                <img data-u="image" src="{{ url('images',$image )}}" />
			                <img data-u="thumb" src="{{ url('images',$image )}}" />
			            </div>
		            @endforeach
		           
		        </div>
		        <!--#region Thumbnail Navigator Skin Begin -->
		        <!-- Help: https://www.jssor.com/development/slider-with-thumbnail-navigator.html -->
		        <style>
		            
		        </style>
		        <!-- thumbnail navigator container -->
		        <div data-u="thumbnavigator" class="jssort07" style="width: 330px; left: 0px; bottom: -20px; ">
		            <!-- Thumbnail Item Skin Begin -->
		            <div data-u="slides" style="cursor: default;">
		                <div data-u="prototype" class="p">
		                    <div data-u="thumbnailtemplate" class="i"></div>
		                    <div class="o"></div>
		                </div>
		            </div>
		            <!-- Thumbnail Item Skin End -->
		            
		            <!--#region Arrow Navigator Skin Begin -->
		            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
		            <style>
		                
		            </style>
		            <div data-u="arrowleft" class="jssora051" style="width:20px;height:20px;top:123px;left:8px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
		                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
		                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
		                </svg>
		            </div>
		            <div data-u="arrowright" class="jssora051" style="width:20px;height:20px;top:123px;right:8px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
		                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
		                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
		                </svg>
		            </div>
		            <!--#endregion Arrow Navigator Skin End -->

		        </div>
		        <!--#endregion Thumbnail Navigator Skin End -->

		        <!-- Trigger -->
		        <script>
		            jssor_slider1_init();
		        </script>
		    </div>
		  

		    <div class="formm">
			    <form action="{{action('ProjectController@storeNote')}}">
					<div>
						<ul>
							<label for="input-1" class="control-label">Рейтинг как продюсер:</label>
						    <input id="input-1"  name="rezh_rate" class="rating rating-loading" data-min="0" data-max="5"  data-step="0.1" value="{{$rezh_rate}}">


						    <br/>
						    <label for="input-2" class="control-label">Рейтинг как режисёр:</label>
						    <input id="input-2"  name="produser_rate" class="rating rating-loading" data-min="0" data-max="5"  data-step="0.1" value="{{$produser_rate}}">


						    <br/>
						    <label for="input-3" class="control-label">Рейтинг как клиент:</label>
						    <input id="input-3" name="client_rate" class="rating rating-loading" data-min="0" data-max="5"   data-step="0.1" value="{{$client_rate}}">
						</ul>
							
					</div>
							<input type="hidden" value="{{$page_id}}" name="page_id">
							<input type="hidden" value="{{$project_id}}" name="project_id">
							<input type="hidden" value="{{$model->id}}" name="user_id">
					 
					<div class="col1">
						<textarea class="form-control" name="comment" rows="4" id="comment"></textarea>

					</div> 
					<button class="btn btn-info formm" type="submit" onclick="formsent()">сохранить заментку и рейтинг</button>
				</form>
			</div>
				
			<div class="video_container">
				@foreach($videos as $video)
					<div id="light">
					  <a class="boxclose" id="boxclose"></a>
					  	name: {{$videos[0]}}
					    <video id="VisaChipCardVideo" width="300" controls>
					      <source src="{{ url('images', $video) }}" type="video/mp4">
					      <!--Browser does not support <video> tag -->
					    </video>
					  
					</div>
				@endforeach
				
			</div>
				
		</div>
	    <div class="first_block_second">
	    	<p class="heading">Модель: {{$model->id}}</p>
	    	@if(Auth::check())
	    	<div class="row">
	    		<div class="col"><p class="text-info">Имя:</p> {{$model->name}}</div>
	    		<div class="col"><p class="text-info">Фамилия: </p> {{$model->surname}}</div>
	    		<div class="col"><p class="text-info">Очество:</p> {{$model->fathersname}}</div>
	    	</div>
	    	<div class="row">
	    		<div class="col"><p class="text-info">Город:</p> {{$model->city}}</div>
	    		<div class="col"><p class="text-info">Адрес: </p> {{$model->address}}</div>
	    		<div class="col"><p class="text-info">Почта:</p> {{$model->email}}</div>
	    		<div class="col"><p class="text-info">Телефон номер:</p> {{$model->phone}}</div>
	    		<div class="col"><p class="text-info">Соц Аккаунты:</p> {{$model->social_acc}}</div>
	    	</div>
	    	@endif
	    	<div class="row">
	    		<div class="col"><p class="text-info">Тип анкеты:</p> {{$model->model_type}}</div>
	    		<div class="col"><p class="text-info">Пол: </p> {{$model->gender}}</div>
	    		<div class="col"><p class="text-info">Загран Паспорт:</p> {{$model->pasport}}</div>
	    		<div class="col"><p class="text-info">Возраст: </p>{{$model->age}}</div>
	    		<div class="col"><p class="text-info">Рост: </p>{{$model->height}}</div>
	    		<div class="col"><p class="text-info">Вес: </p>{{$model->weight}}</div>
	    	</div>
	    	<div class="row">
	    		<div class="col"><p class="text-info">Тип телосложения:</p> {{$model->body}}</div>
	    		<div class="col"><p class="text-info">Размер одежды:</p> {{$model->clothes_size}}</div>
	    		<div class="col"><p class="text-info">Размер обуви:</p> {{$model->foot_size}}</div>
	    		<div class="col"><p class="text-info">Тип внешности: </p>{{$model->appearance}}</div>
	    	</div>
	    	<div class="row">
	    		<div class="col"><p class="text-info">Цвет волос:</p> {{$model->color_hair}}</div>
	    		<div class="col"><p class="text-info">Цвет глаз: </p>{{$model->color_eyes}}</div>
	    		<div class="col"><p class="text-info">Профессия:</p> {{$model->profession}}</div>
	    		<div class="col"><p class="text-info">Текущее место работы:</p> {{$model->current_work}}</div>
	    	</div>
	    		<p class="heading"><p class="text-info">Навыки</p>
	    	<div class="row">
	    		<div class="col"><p class="text-info">Спорт:</p> <br>{{$model->skill_sport}}</div>
	    		<div class="col"><p class="text-info">Боевые искусства:<br></p> {{$model->skill_fight_art}}</div>
	    		<div class="col"><p class="text-info">Танцы: <br> </p>{{$model->skill_dance}}</div>
	    		<div class="col"><p class="text-info">Музыкальные инструменты: <br></p> {{$model->skill_instrumental}}</div>
	    	</div>
	    	<div class="row">
	    		<div class="col"><p class="text-info">Вокал: </p><br>{{$model->skill_vocal}}</div>
	    		<div class="col">В<p class="text-info">ождение :<br></p> {{$model->skill_car_ride}}</div>
	    		<div class="col"><p class="text-info">Верховая езда:</p> <br> {{$model->skill_horse_ride}}</div>
	    		<div class="col"><p class="text-info">Знание языков:</p> <br> {{$model->languages}}</div>
	    		<div class="col"><p class="text-info">Знание языков:</p> <br> {{$model->languages}}</div>
	    	</div>
	    	<div class="row">
	    		<div class="col"><p class="text-info">Другие навыки:</p> <br>{{$model->skill_else}}</div>
	    		<div class="col"><p class="text-info">О Себе:</p><br> {{$model->about_you}}</div>
	    	</div>

	    	<div class="row">
	    		<div class="col"><p class="text-info">Опыт работы на ТВ: </p><br>{{$model->job_experience_tv}}</div>
	    		<div class="col"><p class="text-info">Опыт работы в Театре :</p><br> {{$model->job_experience_teatr}}</div>
	    		<div class="col"><p class="text-info">Готов сниматься обнаженными: </p><br> {{$model->can_naked}}</div>
	    		<div class="col"><p class="text-info">Работает: </p><br> {{$model->have_work}}</div>
	    		<div class="col"><p class="text-info">Готов работать:</p> <br> {{$model->will_work}}</div>
	    	</div>

	    </div>
    </div>





@endsection
