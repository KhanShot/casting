@extends('admin.master')
<head>
    <style type="text/css">

    </style>
</head>
@include('admin.navbar')

@section('content')
@if (\Session::has('success'))
<div class="alert alert-success">
  <p>{{ \Session::get('success') }}</p>
</div><br />
@endif

<!-- DATA TABLE-->

<section class="p-t-20">
    <div class="container">
        <div class="w-form">
          <form  class="form" action="{{route('advancedSearch')}}" method="get" >
            <select id="Field-5" data-name="Field" name="type" class="type_of_anket w-select">
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
              <input type="text" class="text-field-5 w-input" placeholder="От" >
              <input type="text" class="text-field-6 w-input" placeholder="До" >
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
            
            <input type="text" class="text-field-7 w-input" placeholder="Имя" ><input type="submit" value="Подобрать" data-wait="Please wait..." class="submit-button w-button">
          </form>
        </div>
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
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35">data table</h3>

                <!-- <div class="table-data__tool">
                    <div class="table-data__tool-right">
                        <a href="{{route('admin.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add item</a>
                        <a href="{{route('export')}}" class="btn btn-info"> export</a>
                    </div>
                </div> -->
                <!-- SEARCH -->
              <!--   <form class="d-none d-sm-inline-block form-inline" action="{{action('ModelsController@search')}}" method="get" role="form">
                    <div class="input-group">
                        <input type="search" class="form-control bg-light  small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search">
                        <div class="input-group-append">
                        
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i></button>
                      </div>
                    </div>
                </form> -->
                <!-- SEARCH -->
                <!-- FORM -->
                <form method="get" action="{{route('make')}}">
                    {{csrf_field()}}
                    <?php $models = DB::table('casting_models')->orderBy('name', 'asc')->get(); ?>
                    @foreach($models as $model)
                    <div class="worksheet_item">
                        <div class="item_checkbox">
                            <div class="checkbox w-embed">
                                <div id="container">
                                    <input type="checkbox" value="{{ $model->id }}" name="ids[]">
                                    <label for="check"><div></div></label>
                                </div>
                            </div>
                        </div>
                        <div class="item_ava" style="background-image: url('{{ url('images',explode('|',$model->images)[0])}}');">
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
                                <div class="social_items"><a href="#" class="insta w-inline-block"><img src="{{ url('images/instagram-3.svg')}}" width="20" alt=""></a><a href="#" class="youtube w-inline-block"><img src="{{ url('images/youtube-3.svg')}}" width="20" alt=""></a><a href="#" class="vimeo w-inline-block"><img src="{{ url('images/vimeo.svg')}}" width="20" alt=""></a></div>
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
                      <div class="item_details"><a href="{{action('CommentsController@detail', $model->id)}}" class="details w-inline-block"><img src="{{ url('images/Vector-1.svg')}}" alt=""></a></div>
                      <a href="{{action('ModelsController@edit', $model->id)}}" class="btn">edit</a>
                    </div>
                    @endforeach
                    <!-- <div class="position">
                        <select class="form-control" id="inputID" required="" name="project_name">
                            <option> Select project </option>
                            @foreach($projects as $id=>$projecta)
                                @foreach($projecta as $project)
                                @endforeach
                                <option value="{{$project->project_name}}">{{$project->project_name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="pagename" required="" class="form-control">                    
                        <input type="submit" name="btn_count" value="ali" class="btn btn-info">
                    </div> -->
                    <div class="category_list position1 noone">
                        <h2 class="heading-3">Проекты</h2>
                        @foreach($projects as $id=>$projecta)
                            @foreach($projecta as $project)
                            @endforeach
                            <div class="category_item">
                            <div class="checkbox categori_checkbox w-embed">
                              <div id="container">
                                <input type="radio" name="project_name" value="{{$project->project_name}}" name="check">
                                <label for="check"><div></div></label>
                              </div>
                            </div>
                            <h4 class="category_title">{{$project->project_name}}</h4>
                          </div>
                        @endforeach
                        </div>
                    <div class="category_ok_block position">
                        
                        <div class="ok_block">
                          <div class="category_add_block"><a data-w-id="2b158291-55a1-75cd-c6ba-bca4b3c3404b" href="#" class="categories w-inline-block" id="category"><img src="{{ url('images/polygon-1.svg')}}" alt=""><h5 class="heading-4">Категория</h5></a>
                            <div class="input_category">
                              <div class="html-embed w-embed">
                                  <div class="block"><input type="text" name="pagename" required="" placeholder="Имя Страницы" class="input-res"></div>
                              </div>
                            </div>
                          </div>
                          <div class="add_category_button_block">

                            <input type="submit" value="OK" class="ok_button button_ok w-inline-block">
                          </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<style>
    .position{
        position: fixed;

        left: auto;
        top: auto;
        right: 4%;
        bottom: 6%;
        z-index: 10000;
    }
    .position1{
        position: fixed;

        left: auto;
        top: auto;
        right: 33%;
        bottom: 8.7%;
        z-index: 10000;
    }
</style>
<!-- END DATA TABLE-->
@endsection