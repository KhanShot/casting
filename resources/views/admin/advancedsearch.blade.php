@extends('admin.master')
@include('admin.navbar')

@section('content')
<section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form method="get" action="{{route('make')}}">
                    {{csrf_field()}}
                    
                    @foreach($modelss as $model)
                    <?php  $images = unserialize($model->images);?>
                    <div class="worksheet_item">
                        <div class="item_checkbox">
                            <div class="checkbox w-embed">
                                <div id="container">
                                    <input type="checkbox" value="{{ $model->id }}" name="ids[]">
                                    <label for="check"><div></div></label>
                                </div>
                            </div>
                        </div>
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
                      <div class="item_details">
                        <a href="{{action('CommentsController@detail', $model->id)}}" class="details w-inline-block">
                            <img src="{{ url('images/Vector-1.svg')}}" alt="">
                        </a>
                        <a href="{{action('ModelsController@edit', $model->id)}}" class="btn"><i class="fa fa-edit"></i></a>
                        <a href="{{action('ModelsController@destroy', $model->id)}}" class="btn"><i class="fa fa-trash"></i></a>
                      </div>
                      
                    </div>
                    @endforeach
  
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