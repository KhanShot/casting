@extends('admin.master')
@if(Auth::check())
@include('admin.navbar')
@endif
@section('content')

<?php  $images = unserialize($model->images);?>
<?php  $videos = unserialize($model->videos);?>
<!--   <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
 -->	
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
<div class="cart_anket">
    <div class="container">
      <div class="tool_bar">
        <h1 class="heading-2">Анкета номер: {{$model->id}}</h1>
      </div>
      <div class="w-layout-grid grid-2">
      	<a href="#" class="lightbox-link w-inline-block w-lightbox">
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
	        <div class="text-block-13"><span class="bold_naiming">Пол:</span> {{$model->gender}}</div>
	        <div class="text-block-13"><span class="bold_naiming">Возраст:</span> {{$model->age}}</div>
	        <div class="text-block-13"><span class="bold_naiming">Рост:</span> {{$model->height}}</div>
	        <div class="text-block-13"><span class="bold_naiming">Вес:</span> {{$model->weight}}</div>
	        <div class="text-block-13"><span class="bold_naiming">Текущее место работы:</span> {{$model->current_work}}</div>
	        <div class="text-block-13"><strong class="bold_naiming">Профессия</strong>: {{$model->profession}}</div>
	        <div class="text-block-13"><span class="bold_naiming">Готов к командировкам:</span> {{$model->can_go_abroad}}</div>
	        <div class="text-block-13"><span class="bold_naiming">Загранпаспорт: </span>{{$model->pasport}}</div>
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
          <div class="client_bar">
            <div class="text-block-16">Рейтинг и заметки клиента</div>
            <div class="raiting_block">
              <div class="text-block-17">Клиент:</div>
              <div class="star_block">
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9"></div>
                <div class="div-block-9"></div>
              </div>
            </div>
            <div class="raiting_block">
              <div class="text-block-17">Режиссер:</div>
              <div class="star_block">
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9"></div>
                <div class="div-block-9"></div>
                <div class="div-block-9"></div>
              </div>
            </div>
            <div class="raiting_block">
              <div class="text-block-17">Агентство:</div>
              <div class="star_block">
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9"></div>
                <div class="div-block-9"></div>
              </div>
            </div>
            <div class="raiting_block">
              <div class="text-block-17">Продюсер:</div>
              <div class="star_block">
                <div class="div-block-9 active_star"></div>
                <div class="div-block-9"></div>
                <div class="div-block-9"></div>
                <div class="div-block-9"></div>
                <div class="div-block-9"></div>
              </div>
            </div>
            <div class="w-form">
              <form id="email-form-2" name="email-form-2" data-name="Email Form 2" class="form-4"><label for="name" class="field-label-2">Комментарий к анкете</label><textarea name="field" maxlength="5000" id="field" placeholder="Оставьте ваш комментарий" class="textarea-2 w-input"></textarea><input type="submit" value="Сохранить" data-wait="Please wait..." class="submit-button-5 w-button"></form>
            </div>
          </div>
        </div>
        <div class="service_block">
          <div class="video_warp">
          	@foreach($images as $image)
	        <div class="video_item" style="background-image: url('{{ url('images/models', $image)}}');">
	        </div>
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

</div>

@endsection
