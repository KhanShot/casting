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
<div class="anket_list_block">
  <div class="container">
    <h1 class="heading">Анкеты для проекта <a href="{{URL::previous()}}">name</a>/{{$models[0]->page_name}}</h1>
    @foreach($models as $model)
    <div class="item_warp">
      <div class="item">
        <div class="w-layout-grid item_col">
          <div class="chek">
            <div class="id_anketa">{{$model->id}}</div>
          </div>
          <div class="img_avatar img_girl">
            <div class="toolbar">
              <div class="hair hair_white"></div>
              <div class="kind"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8af7c3e9b086c6950ed944_venus.svg" height="17" alt="" class="image-2 vinera"></div>
              <div class="text-block-5">{{$model->age}}</div>
              <div class="text-block-6"><span class="text-span">Рост</span>: {{$model->height}}</div>
            </div>
          </div>
          <div class="main_info">
            <div class="text-block-9">{{$model->model_type}}</div>
            <div class="w-layout-grid grid">
              <div class="text-block-8"><span>Тип телосложения: </span> {{$model->body}}</div>
              <div id="w-node-99f14675084b-24843d31" class="text-block-8">Вес: {{$model->weight}}</div>
              <div id="w-node-6dc048a836f8-24843d31" class="text-block-8">Обувь: {{$model->foot_size}}</div>
              <div id="w-node-1f76167e0ad4-24843d31" class="text-block-8">Пол: {{$model->gender}}</div>
              <div id="w-node-c328f22b34db-24843d31" class="text-block-8">Одежда: {{$model->clothes_size}}</div>
            </div>
          </div>
          <div class="contact_info">
            <div class="text-block-9">Информация</div>
            <div class="w-layout-grid grid">
              <div class="text-block-8"><span>Тип внешности:</span> {{$model->appearance}}</div>
              <div id="w-node-9a893a9d3ec2-24843d31" class="text-block-8">Знание языков: {{$model->languages}}</div>
              <div id="w-node-9a893a9d3ec4-24843d31" class="text-block-8"><span>Готов к командировкам:</span> {{$model->can_go_abroad}}<br></div>
              <div id="w-node-9a893a9d3ec6-24843d31" class="text-block-8"><span>Загранпаспорт: </span>{{$model->pasport}}</div>
              <div id="w-node-154ec6ef2561-24843d31" class="text-block-8"><span>Готовы ли сниматься обнаженными?:</span> {{$model->can_naked}}</div>
            </div>
          </div>
          <div class="icon_redaction">
            <form action="{{action('CommentsController@detail', $model->user_id)}}" method="get">
             
                      <img src="{{ url('images/Vector-1.svg')}}" alt="">
                      <input type="hidden" value="{{$project_id}}" name="qplamznxbcv" >
                      <input type="hidden" value="{{$model->page_id}}" name="mzlapqoweiruty">
                      <input type="hidden" value="{{$model->user_id}}" name="alzmpqksjdhfg">
                      <input type="submit" id="submit{{$model->id}}" style="display: none;">
                
            <a href="#" id="click{{$model->id}}" class="link-block open w-inline-block">
              <img src="{{ asset ('images/logout.svg')}}" height="26" alt="" class="image-7 page_anketa">
            </a>
            <script type="text/javascript">
                $( document ).ready(function() {
                  $( "#click{{$model->id}}" ).on( "click", function() {
                    $("#submit{{$model->id}}").click();
                  });
                });
            </script>
              </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
<!-- @if(Auth::check())
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
</td> -->

@endsection