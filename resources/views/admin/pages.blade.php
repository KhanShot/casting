@extends('admin.master')
@include('admin.navbar')
@section('content')



<script type="text/javascript">

    function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("myInput");
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");

      /* Alert the copied text */
      alert("Copied the text: " + copyText.value);
    }

</script>

<div class="body">
<div>
 
    <input type="text" value="{{ url()->current() }}?{{$pageurl}}" id="myInput" class="form-control">

    <!-- The button used to copy the text -->
    <button onclick="myFunction()" class="btn btn-info">Копировать ссылку</button>
</div>
@if(Auth::check())
<h3><a href="{{route('projects')}}">Папки</a>/<a href="{{URL::previous()}}">проeкты</a>/{{$models[0]->page_name}}</h3>
@endif
<td class="page">
	@foreach($models as $model)
		<div class="page_container">
			<?php  $images = unserialize($model->images);?>		                
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
                        <div class="ava_age">{{$model->age}}</div>
                    </div>
                </div>
                <div class="item_info">
                    <div class="item_name">
                        <h4 class="heading">Имя:</h4>
                        <h4 class="heading-2">{{$model->name}} {{$model->surname}}</h4>
                    </div>
                    <div class="item_height">
                        <h4 class="heading">Рост:</h4>
                        <h4 class="heading-2">{{$model->height}} см</h4>
                    </div>
                    <div class="item_grud">
                        <h4 class="heading ">Тип анкеты:</h4>
                        <h4 class="heading-2">{{$model->model_type}}</h4>
                    </div>
                    <div class="item_shoes">
                        <h4 class="heading">Обувь: </h4>
                        <h4 class="heading-2">{{$model->foot_size}}</h4>
                    </div>
                </div>
                <div class="item_address">
                  <h3>{{$model->page_id}}</h3>
                  <h3>{{$model->user_id}}</h3>
                  <h3>{{$project_id}}</h3>
                </div>
              <div class="item_details">
              	<form action="{{action('CommentsController@detail', $model->user_id)}}" method="get">
                    <button type="submit" class="details w-inline-block">
                        <img src="{{ url('images/Vector-1.svg')}}" alt="">
                        <input type="hidden" value="{{$project_id}}" name="qplamznxbcv" >
                        <input type="hidden" value="{{$model->page_id}}" name="mzlapqoweiruty">
                        <input type="hidden" value="{{$model->user_id}}" name="alzmpqksjdhfg">
                    </button>
				        </form>
				@if(Auth::check())
                	<a href="{{action('ModelsController@destroy', $model->id)}}" class="btn"><i class="fa fa-trash"></i></a>
                	<a href="{{action('ModelsController@edit', $model->id)}}" class="btn"><i class="fa fa-edit"></i></a>

				@endif
              </div>
            </div>
		</div>
	@endforeach	
</td>

@endsection