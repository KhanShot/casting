@extends('admin.master')

    <style type="text/css">
      .d-block{
        display: flex;
        justify-content: center;
      }
      .d-none{
        display: none;
      }
    </style>
@include('admin.navbar')
@section('content')
<form action="{{route('make')}}">
<div class="anket_list_block">
    <div class="container">
      <h1 class="heading">Все анкеты</h1>
      @foreach($models as $model)
      <?php $images = unserialize($model->images) ?>
      <div class="item_warp">
        <div class="item">
          <div class="w-layout-grid item_col">
            <div class="chek">
              <div class="chek_in" id="check_black{{$model->id}}">
                <div class="div-block-2 d-none" id="check_white{{$model->id}}"></div>
              </div>
                <input type="checkbox" style="display: none;"  id="checkbox{{$model->id}}" name="ids[]" value="{{$model->id}}">
            </div>
            <script type="text/javascript">
              $(document).ready(function(){
                var count = 0;
                $('#check_black{{$model->id}}').on('click', function () {
                  var clicks = $(this).data('clicks');
                  if (clicks) {
                    $('#check_white{{$model->id}}').removeClass('d-none');
                    $('#checkbox{{$model->id}}').attr('checked',"");
                  } else {
                      $('#check_white{{$model->id}}').addClass('d-none');
                      $('#checkbox{{$model->id}}').removeAttr('checked',"");
                  }
                  $(this).data("clicks", !clicks);
                });

              });
            </script>
            <div class="img_avatar img_girl" style="background-image: url('@if(isset($images[0])){{ url('images/models', $images[0])}}@else{{ asset('images/thumb1.jpg')  }}@endif');">
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
                <div class="text-block-8">{{$model->surname.' ' .$model->name.' '.$model->fathersname}}</div>
                <div id="w-node-99f14675084b-78d46238" class="text-block-8">Вес: {{$model->weight}}</div>
                <div id="w-node-6dc048a836f8-78d46238" class="text-block-8">Обувь: {{$model->foot_size}}</div>
                <div id="w-node-1f76167e0ad4-78d46238" class="text-block-8">Внешность: {{$model->appearance}}</div>
                <div id="w-node-c328f22b34db-78d46238" class="text-block-8">Одежда: {{$model->clothes_size}}</div>
              </div>
            </div>
            <div class="contact_info">
              <div class="text-block-9">Контактная информация</div>
              <div class="w-layout-grid grid">
                <div class="text-block-8 phone">{{$model->phone}}</div>
                <?php $social_acc = unserialize($model->social_acc) ?>
                <div id="w-node-9a893a9d3ec0-78d46238" class="text-block-8">
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
                <div id="w-node-9a893a9d3ec2-78d46238" class="text-block-8">{{$model->city}}</div>
                <div id="w-node-9a893a9d3ec4-78d46238" class="text-block-8">{{$model->address}}<br></div>
                <div id="w-node-9a893a9d3ec6-78d46238" class="text-block-8">{{$model->email}}</div>
              </div>
            </div>
            <div class="icon_redaction">
              <a href="{{route('detailforadmin', $model->id)}}" class="d-block">
                <img src="{{ asset ('images/logout.svg')}}" height="26" alt="" class="image-7">
              </a>
              <a href="{{action('ModelsController@edit', $model->id)}}" class="d-block">
                
              <img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b04248c12c70e2139b457_edit.svg" height="23" alt="" class="edit">
              </a>
              <a href="{{action('ModelsController@destroy', $model->id)}}" class="d-block">
              <img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b03d2e9b086a33a0f69b7_delete-button.svg" height="23" alt="" class="delete">
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
</div>
<div class="category">
    <div class="div-block-4">
      <div class="w-form">
          @foreach($projects as $project)
            <label class="w-checkbox">
              <input type="checkbox" name="project_name[]" value="{{$project[0]->id}}" class="w-checkbox-input"><span class="w-form-label">{{$project[0]->project_name}}</span>
            </label>        
          @endforeach
      </div>
    </div><img src="{{ asset ('images/plus.svg')}}" height="29" alt="" class="image-8">
    <div class="form-block-3 w-form">
      
        <input type="text" class="text-field-4 w-input"  name="pagename"placeholder="Укажите название страницы">
        <div>
          <input type="submit" value="Создать" class="submit-button-3 w-button"><a href="{{route('projects')}}" class="link">Проекты</a>
        </div>
      
    </div>

</div>
</form>
<div class="filter">
    <div class="container">
      <div class="form-block-2 w-form">
        <form id="filter" action="{{route('datatable')}}" class="form-2">
          <select  name="model_type" class="select-field-2 w-select">
            <option value="" >Тип анкеты</option>
            <option value="Проф. Актер">Проф. Актер</option>
            <option value="Актер">Актер</option>
            <option value="Массовка">Массовка</option>
            <option value="Без опыта">Без опыта</option>
          </select>
          <select  name="gender" class="select-field-2 w-select">
            <option value="">Пол</option>
            <option value="Мужской">Мужской</option>
            <option value="Женский">Женский</option>
          </select>
          <select  name="color_eyes" class="select-field-2 w-select">
            <option value="">Цвет глаз</option>
            <option value="Карий">Карий</option>
              <option value="Синий">Синий</option>
              <option value="Голубой">Голубой</option>
              <option value="Чёрный">Чёрный</option>
              <option value="Болотный">Болотный</option>
              <option value="another">Другое</option>
          </select>
          <select  name="color_hair" class="select-field-2 w-select">
            <option value="">Цвет волос</option>
            <option value="Брюнет">Брюнет</option>
            <option value="Блондин">Блондин</option>
            <option value="Рыжий">Рыжий</option>
            <option value="Шатен">Шатен</option>
            <option value="Седой">Седой</option>
            <option value="another">Другое</option>
          </select>
          <div class="div-block-3">
            <div class="text-block-10">Возраст:</div>
            <input type="text" class="text-field-2 w-input"  name="age_at" placeholder="От">
            <input type="text" class="text-field-2 w-input"  name="age_do" placeholder="До" >
          </div>
          <div class="div-block-3">
            <div class="text-block-10">Рост:</div>
            <input type="text" class="text-field-2 w-input"  name="height_at" placeholder="От" >
            <input type="text" class="text-field-2 w-input"  name="height_do" placeholder="До" >
          </div>
          <input type="text" class="text-field-3 w-input"  name="hashtag" placeholder="Укажите тег" >
          <a type="button" href="{{route('datatable')}}" class="submit-button-2 w-button"> x </a>
          <input type="submit" value="Поиск" data-wait="Please wait..." class="submit-button-2 w-button">
        </form>
      </div>
    </div>
</div>
<script type="text/javascript">
  $( document ).ready(function() {

    $( "[type='submit']" ).on( "click", function() {
      $.ajax({
        url: '{{route("datatable")}}' ,
        type: "GET",
        data: { model_type:$("[name='model_type']").val(), gender:$("[name='gender']").val(), color_eyes:$("[name='color_eyes']").val(), color_hair:$("[name='color_hair']").val(), age_at:$("[name='age_at']").val(),age_do:$("[name='age_do']").val(), height_at:$("[name='height_at']").val(),height_do:$("[name='height_do']").val(), hashtag:$("[name='hashtag']").val() },
        success: function( response ) {
           
        }
      });
    });
  });
</script>


<!--         <div class="w-form">
          <form  class="form" action="{{route('advancedSearch')}}" method="get" >
            <select id="Field-5" data-name="model_type" name="model_type" class="type_of_anket w-select">
              <option value="">Тип анкеты</option>
              <option value="Актер">Актер</option>
              <option value="Массовка">Массовка</option>
            </select>
            <select id="Field-8" data-name="Field 8" name="gender" class="gender w-select">
              <option value="">Пол</option>
              <option value="Мужской">Мужской</option>
              <option value="Женский">Женский</option>
            </select>
           
         
            <div class="div-block">
              <div>Возраст:</div>
              <input type="number" name="age_at" class="text-field-3 w-input" placeholder="От">
              <input type="number" name="age_do" class="text-field-4 w-input" placeholder="До">
            </div>
            
            <div class="div-block-4">
              <div>Рост:</div>
              <input type="text" name="height_at" class="text-field-5 w-input" placeholder="От" >
              <input type="text" name="height_do" class="text-field-6 w-input" placeholder="До" >
            </div>
           
            <select id="Field-7" name="color_eyes" class="eye_color w-select">
                <option value="">Цвет глаз</option>
                <option value="Карий" >Карий</option>
                <option value="Синий" >Синий</option>
                <option value="Голубой">Голубой</option>
                <option value="Чёрный" >Чёрный</option>
                <option value="Болотный" >Болотный</option>
                <option value="others">другое</option>
            </select>
              
                
           
            
            <select id="Field-6" data-name="Field 6" name="color_hair" class="hair_color w-select">
                <option value="">Цвет Волос</option>
                <option value="Брюнет" >Брюнет</option>
                <option value="Блондин" >Блондин</option>
                <option value="Рыжий">Рыжий</option>
                <option value="Шатен" >Шатен</option>
                <option value="Седой" >Седой</option>
                <option value="others">другое</option>
            </select>
            
            <input type="text" class="text-field-7 w-input" name="hashtag" placeholder="Имя" >
            <input type="submit" value="Подобрать" data-wait="Please wait..." class="submit-button w-button">
          </form>
        </div> -->
       <!--      <form action="{{route('advancedSearch')}}" method="get">
                <div class="field">
                <label class="label"><strong class="has-text-grey">Eye color </strong></label>
                    <div class="control">
                        <div class="select  is-primary">
                            <select name="color_eyes">
                                <option value="">Not Given</option>
                                <option value="Карий" >Карий</option>
                                <option value="Синий" >Синий</option>
                                <option value="Голубой">Голубой</option>
                                <option value="Чёрный" >Чёрный</option>
                                <option value="Болотный" >Болотный</option>
                                <option value="others">другое</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                <label class="label"><strong class="has-text-grey">hair color </strong></label>
                    <div class="control">
                        <div class="select  is-primary">
                            <select name="color_hair">
                                <option value="">Not Given</option>
                                <option value="Брюнет" >Брюнет</option>
                                <option value="Блондин" >Блондин</option>
                                <option value="Рыжий">Рыжий</option>
                                <option value="Шатен" >Шатен</option>
                                <option value="Седой" >Седой</option>
                                <option value="others">другое</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                <label class="label"><strong class="has-text-grey">Тип телосложения </strong></label>
                    <div class="control">
                        <div class="select  is-primary">
                            <select name="body">
                                <option value="">Not Given</option>
                                <option value="худой" >худой</option>
                                <option value="нормальный" >нормальный</option>
                                <option value="атлетический">атлетический</option>
                                <option value="в теле" >в теле</option>
                                <option value="полный" >полный</option>
                                <option value="others">другое</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                <label class="label"><strong class="has-text-grey">appearance Тип внешности:</strong></label>
                    <div class="control">
                        <div class="select  is-primary">
                            <select name="appearance">
                                <option value="">Not Given</option>
                                <option value="европейский" >европейский</option>
                                <option value="азиатский" >азиатский</option>
                                <option value="евразийский">евразийский</option>
                                <option value="афро" >афро</option>
                                <option value="Other">другое</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <label class="label"><strong class="has-text-grey">Age</strong></label>
                    <div style="display: flex; flex-direction: row; align-items: center;">
                        <input class="form-control" type="number" name="age_at" style="width: 7%; margin-right: 10px;" > -
                        <input class="form-control" type="number" name="age_do" style="width: 7%; margin-left: 10px;" >
                    </div>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i> Поиск</button>
            </form>
     -->
    <!--         <div class="row">
                <div class="col-md-12">
                    <form method="get" action="{{route('make')}}">
                        {{csrf_field()}}
                        <?php $models = DB::table('casting_models')->orderBy('name', 'asc')->get(); ?>
                        @foreach($models as $model)
                        <?php  $images = unserialize($model->images);?>
                        <?php  $social_acc = unserialize($model->social_acc);?>
                        <div class="worksheet_item">
                            <div class="item_checkbox">
                                <div class="checkbox w-embed">
                                    <div id="container">
                                        <input type="checkbox" value="{{ $model->id }}" name="ids[]">
                                        <label for="check"><div></div></label>
                                    </div>
                                </div>
                            </div>
                            <div class="item_ava" style="background-image: url('@if(isset($images[0])){{ url('images', $images[0])}}@else{{ asset('images/thumb1.jpg')  }}@endif');">
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
                                    <h4 class="heading ">Грудь:</h4>
                                    <h4 class="heading-2">2</h4>
                                </div>
                                <div class="item_shoes">
                                    <h4 class="heading">Обувь: </h4>
                                    <h4 class="heading-2">{{$model->foot_size}}</h4>
                                </div>
                            </div>
                            <div class="item_address">
                                <div class="item_phone">
                                    <h4 class="heading">Тел.:</h4><a href="#" class="link-3">{{$model->phone}}</a></div>
                                <div class="item_socials">
                                    <h4 class="heading">Соц. сети:</h4>
                                    <div class="social_items">
                                        @foreach($social_acc as $soc_acc)
                                            @if (strpos($soc_acc, 'instagram.com') !== false)
                                                <a target="_blank" href="https://www.{{$soc_acc}}" class="insta w-inline-block"><img src="{{ url('images/instagram-3.svg')}}" width="20" ></a>
                                            @endif
                                            @if (strpos($soc_acc, 'youtube.com') !== false)
                                                <a target="_blank" href="https://www.{{$soc_acc}}" class="youtube w-inline-block"><img src="{{ url('images/youtube-3.svg')}}" width="20"></a>
                                            @endif
                                            @if (strpos($soc_acc, 'vimeo.') !== false)
                                                <a target="_blank" href="https://www.{{$soc_acc}}" class="youtube w-inline-block"><img src="{{ url('images/youtube-3.svg')}}" width="20"></a>
                                            @endif
                                            @if (strpos($soc_acc, 'vk.com') !== false)
                                                <a target="_blank" href="https://www.{{$soc_acc}}" class="insta w-inline-block"><img src="{{ url('images/vk-social.svg')}}" width="20"></a>
                                            @endif
                                            @if (strpos($soc_acc, 'vimeo') === false && strpos($soc_acc, 'vk.com') === false && strpos($soc_acc, 'instagram.com') === false )
                                                <a target="_blank" href="https://www.{{$soc_acc}}" class="insta w-inline-block"><img src="{{ url('images/cursor.svg')}}" width="20"></a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="item_city">
                                    <h4 class="heading ">Город:</h4>
                                    <h4 class="heading-2">{{$model->city}}</h4>
                                </div>
                                <div class="item_adres ">
                                    <h4 class="heading ">Адрес:</h4>
                                    <h4 class="heading-2">{{$model->address}}</h4>
                                </div>
                            </div>
                          <div class="item_details">
                            <a href="{{route('detailforadmin', $model->id)}}" class="details w-inline-block">
                                <img src="{{ url('images/Vector-1.svg')}}" alt="">
                            </a>
                            <a href="{{action('ModelsController@edit', $model->id)}}" class="btn"><i class="fa fa-edit"></i></a>
                            <a href="{{action('ModelsController@destroy', $model->id)}}" class="btn"><i class="fa fa-trash"></i></a>
                          </div>
                          
                        </div>
                        @endforeach
                    </form>
                </div>
            </div> -->


<!-- END DATA TABLE-->

@endsection