@extends('admin.master')
@include('admin.navbar')
@section('content')
		@if (\Session::has('msg_error'))
		<div class="alert alert-warning">
		    <p>{{ \Session::get('msg_error') }}</p>
		</div><br/>
		@endif
	<p>текущий проект: 
		@foreach($project_name as $pron)
			<span class="text-info">{{$pron->project_name}}</span>
		@endforeach
	</p>
	<div class="block">
		<form action="{{ route('move_or_copy') }}" class="d-flex "  style="align-items: center;">
			<input type="hidden" name="proname" value="{{$pron->project_name}}">
		<h1 class="heading text-info ">
			@foreach($models as $modelss  )
			@foreach($modelss as $model)
			@endforeach
				{{$model->page_name}}
			@endforeach
			<input type="hidden" name="page_id" value="{{$model->page_id}}">
			<input type="hidden" name="project_id" value="{{$model->project_id}}">
		</h1>
			<SELECT placeholder="" class="form-group form-control ML-2"  name="move_or_copy" style="width: 20%">
				<option value="copy">Копировать</option>
				<option value="move">Переместить</option>
			</SELECT>
			<SELECT placeholder="" class="form-group form-control ML-2" name="projects"  style="width: 20%">
	            <option > </option>
	            @foreach($projects as $project)
	            	<option value="{{$project[0]->project_name}}" >{{$project[0]->project_name}}</option>
	            @endforeach

	        </SELECT>
	        <input type="submit" class=" btn btn-info ML-2" value="отправить"> 
		</form>
	</div>

	
	<div class="container">
		@foreach($models as $modelss)
			@foreach($modelss as $model)
			@endforeach
		        <?php  $images = unserialize($modelss[0]->images);?>
		        <div class="worksheet_item">
		          
		            <div class="item_ava" style="background-image: url('{{ url('images', $images[0]) }}');">
		                <div class="ava_items">
		                    <div class="ava_hair_color"></div>
		                    <div class="ava_gender ">
		                        @if($model->gender == 'Мужской')
		                            М
		                        @else
		                            Ж
		                        @endif
		                    </div>
		                    <div class="ava_age">{{$modelss[0]->age}}</div>
		                </div>
		            </div>
		            <div class="item_info">
		                <div class="item_name">
		                    <h4 class="heading">Имя:</h4>
		                    <h4 class="heading-2">{{$modelss[0]->name}} {{$modelss[0]->surname}}</h4>
		                </div>
		                <div class="item_height">
		                    <h4 class="heading">Рост:</h4>
		                    <h4 class="heading-2">{{$modelss[0]->height}} см</h4>
		                </div>
		                <div class="item_grud">
		                    <h4 class="heading ">Грудь:</h4>
		                    <h4 class="heading-2">2</h4>
		                </div>
		                <div class="item_shoes">
		                    <h4 class="heading">Обувь: </h4>
		                    <h4 class="heading-2">{{$modelss[0]->foot_size}}</h4>
		                </div>
		            </div>
		            <div class="item_address">
		                <div class="item_phone">
		                    <h4 class="heading">Тел.:</h4><a href="#" class="link-3">{{$modelss[0]->phone}}</a></div>
		                <div class="item_socials">
		                    <h4 class="heading">Соц. сети:</h4>
		                    <div class="social_items"><a href="#" class="insta w-inline-block"><img src="{{ url('images/instagram-3.svg')}}" width="20" alt=""></a><a href="#" class="youtube w-inline-block"><img src="{{ url('images/youtube-3.svg')}}" width="20" alt=""></a><a href="#" class="vimeo w-inline-block"><img src="{{ url('images/vimeo.svg')}}" width="20" alt=""></a></div>
		                </div>
		                <div class="item_city">
		                    <h4 class="heading ">Город:</h4>
		                    <h4 class="heading-2">{{$modelss[0]->city}}</h4>
		                </div>
		                <div class="item_adres ">
		                    <h4 class="heading ">Адрес:</h4>
		                    <h4 class="heading-2">{{$modelss[0]->address}}</h4>
		                </div>
		            </div>
		          <div class="item_details">
		            <a href="{{action('CommentsController@detail', $modelss[0]->id)}}" class="details w-inline-block">
		                <img src="{{ url('images/Vector-1.svg')}}" alt="">
		            </a>
		            <a href="{{action('ModelsController@edit', $modelss[0]->id)}}" class="btn"><i class="fa fa-edit"></i></a>
		            <a href="{{action('ModelsController@destroy', $modelss[0]->id)}}" class="btn"><i class="fa fa-trash"></i></a>
		          </div>
		          
		        </div>
		    
        @endforeach
	</div>

@endsection