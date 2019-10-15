@extends('admin.master')
@include('admin.navbar')
@section('content')
<?php  $images = unserialize($model->images);?>
<?php  $videos = unserialize($model->videos);?>
<?php  $social_acc = unserialize($model->social_acc);?>
<div class="cart_anket">
<div class="container">
  <div class="tool_bar">
    <h1 class="heading-2">Анкета номер: {{$model->id}}</h1>
    <div class="div-block-8">
    	<a href="{{action('ModelsController@edit', $model->id)}}" class="edit_page w-inline-block">
    		<img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b04248c12c70e2139b457_edit.svg" height="20" alt="">
    	</a>
    	<a href="{{action('ModelsController@destroy', $model->id)}}" class="delete_page w-inline-block">
    		<img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b03d2e9b086a33a0f69b7_delete-button.svg" height="19" alt="" class="delete">
    	</a>
    </div>
  </div>
  <div class="w-layout-grid grid-2"><a href="#" class="lightbox-link w-inline-block w-lightbox">
    <img src="@if(isset($images[0])){{ url('images/models', $images[0])}}@else{{ asset('images/thumb1.jpg')  }}@endif" alt="" class="image-9"> 
      <script type="application/json" class="w-json">
              
          {
            "items": [
            <?php 
            foreach ($images as $image) {
            	echo '
            		{
		                "cdnUrl": "https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg",
		                "width": 150,
		                "height": 150,
		                "fileName": "image-placeholder.svg",
		                "origFileName": "image-placeholder.svg",
		                "url": "'.url('images/models', $image).'" ,
		                "_id": "example_img",
		                "type": "image",
		                "fileSize": 2063
		              },
            	';

            } ?>
              {
                "cdnUrl": "https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg",
                "width": 150,
                "height": 150,
                "url": "{{url('images/models', $videos[0])}}",
                "_id": "example_img",
                "type": "video",
                "fileSize": 2063
              }

            ]
          }

    </script>
    </a>
    <div class="w-layout-grid grid-3">
      <div>
        <div class="text-block-12 main_info">{{$model->model_type}}</div>
        <div class="text-block-13 bold_naiming">{{$model->surname." ". $model->name." ".$model->fathersname }}</div>
        <div class="text-block-13"><span class="bold_naiming">Пол:</span> {{$model->gender}}</div>
        <div class="text-block-13"><span class="bold_naiming">Возраст:</span> {{$model->age}}</div>
        <div class="text-block-13"><span class="bold_naiming">Рост:</span> {{$model->height}}</div>
        <div class="text-block-13"><span class="bold_naiming">Вес:</span> {{$model->weight}}</div>
        <div class="text-block-13"><span class="bold_naiming">Текущее место работы:</span> {{$model->current_work}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Профессия</strong>: {{$model->profession}}</div>
        <div class="text-block-13"><span class="bold_naiming">Готов к командировкам:</span> {{$model->can_go_abroad}}</div>
        <div class="text-block-13"><span class="bold_naiming">Загранпаспорт: </span>{{$model->pasport}}</div>
      </div>
      <div>
        <div class="text-block-12 main_info">Контактная информация</div>
        <div class="text-block-13">{{$model->phone}}</div>
        <div class="text-block-8 text-block-13">
        	@foreach($social_acc as $soc_acc)
                @if (strpos($soc_acc, 'instagram.com') !== false)
                    <a target="_blank" href="https://www.{{$soc_acc}}" class="insta w-inline-block"><img src="{{ asset ('images/instagram.svg')}}" height="15" alt="" class="image-6" style="margin-left: 3px;"></a>
                @endif

                @if (strpos($soc_acc, 'vk.com') !== false)
                    <a target="_blank" href="https://www.{{$soc_acc}}" class="insta w-inline-block"><img src="{{ asset ('images/vk.svg')}}" height="16" alt="" class="image-5" style="margin-left: 3px;"></a>
                @endif

                @if (strpos($soc_acc, 'vimeo') === false && strpos($soc_acc, 'vk.com') === false && strpos($soc_acc, 'instagram.com') === false )
                    <a target="_blank" href="https://www.{{$soc_acc}}" class="insta w-inline-block"><img src="{{ url('images/cursor.svg')}}" width="20"></a>
                @endif
            @endforeach

        </div>
        <div class="text-block-13">г. {{$model->city}}</div>
        <div class="text-block-13">{{$model->address}}</div>
        <div class="text-block-13">{{$model->email}}</div>
        <div class="div-block-5">
          <div class="text-block-14">Заметка агенства</div>
          <div class="text-block-15">{{$model->admin_comment}}<br></div>
        </div>
      </div>
      <div class="div-block-6">
        <div class="text-block-12 main_info">Внешность</div>
        <div class="text-block-13"><span class="bold_naiming">Цвет глаз:</span> {{$model->color_eyes}}</div>
        <div class="text-block-13"><span class="bold_naiming">Цвет волос:</span> {{$model->color_hair}}</div>
        <div class="text-block-13"><span class="bold_naiming">Тип внешности:</span> {{$model->appearance}}</div>
        <div class="text-block-13"><span class="bold_naiming">Тип телосложения: </span>{{$model->body}}</div>
        <div class="text-block-13"><span class="bold_naiming">Размер одежды:</span>{{$model->clothes_size}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Готовы ли сниматься обнаженными?</strong>:</span> {{$model->can_naked}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Работаете ли вы?</strong></span>: {{$model->have_work}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Готовы ли вы работать?</strong>: </span> {{$model->will_work}}</div>
      </div>
      <div class="div-block-7">
        <div class="text-block-12 main_info">Дополнительные навыки</div>
        <div class="text-block-13"><span class="bold_naiming">Спорт:</span> {{$model->skill_sport}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Боевые искусства</strong>:</span> {{$model->skill_fight_art}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Танцы</strong>:</span> {{$model->skill_dance}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Музыкальные инструменты</strong>:</span> {{$model->skill_instrumental}}</div>
        <div class="text-block-13"><span class="bold_naiming">Вокал:</span> {{$model->skill_vocal}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Верховая езда</strong>:</span> {{$model->skill_horse_ride}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Другие навыки</strong>: {{$model->skill_else}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Знание языков</strong>: {{$model->languages}}</div>
        <div class="text-block-13"><span><strong class="bold_naiming">Водительское удостоверение</strong>:</span>{{$model->skill_car_ride}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Предпочтение в еде</strong>: {{$model->food_prefer}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Аллергия</strong>: {{$model->allergy}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Заболевания</strong>: {{$model->illness}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Опыт работы в кино на TV</strong>: {{$model->job_experience_tv}}</div>
        <div class="text-block-13"><strong class="bold_naiming">Опыт работы в театре</strong>: {{$model->job_experience_teatr}}</div>
        <div class="text-block-13"><strong class="bold_naiming">О себе</strong>: {{$model->about_you}}</div>
      </div>
    </div>
    <div class="service_block">
      <div class="video_warp">
      	@foreach($images as $image)
        <div class="video_item" style="background-image: url('{{ url('images/models', $image)}}');">
        	<img src="{{ asset ('images/play-button-1.svg')}}" width="35" height="35" alt="" class="play_video"></div>
        @endforeach
      </div>
        <div class="form-block-4 w-form">
            <input type="text" value="{{ url()->current() }}" id="myInput"class="text-field-5 w-input" >
            <input type="button" value="Копировать" onclick="myFunction()" class="submit-button-4 w-button">
        </div>
    </div>
  </div>
</div>
</div>
@endsection
