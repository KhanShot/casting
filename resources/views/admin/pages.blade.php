@extends('admin.master')

@section('content')

<h1>{{$models[0]->page_name}}</h1>
<a href="{{route('export')}}" class="btn btn-info"> export</a>
@foreach($models as $value=>$model)
<?php  $images = unserialize($model->images);?>
	<p>{{$model->surname}}</p>
	<p>{{$model->color_hair}}</p>
	
	<div class='rating-stars'>
	    <ul id='stars'>
	      <li class='star' data-value='1'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li class='star' data-value='2'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li class='star' data-value='3'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li class='star' data-value='4'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <li class='star' data-value='5'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
	      <input type="hidden" name="whatever1" class="rating-value" value="4">
	    </ul>
	  </div>
	  <div class="col-sm-4">
	  	<textarea class="form-control" name="comment_text" rows="5" id="comment"></textarea>
	  </div>
	<img src="{{ url('images',$model->images)}}" style="width: 150px; height: 150px;">
	actors:name---<a class=" btn btn-outline-info"  href="{{action('CommentsController@detail', $model->user_id)}}" data-toggle="tooltip" data-placement="top" title="Edit"><p>{{$model->name}}</p></a>
	{{$model->user_id}}////
	<p>-----------------</p>
@endforeach
<td class="page">
	<h4>Имя Страницы: </h4>
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
	                                <h4 class="heading ">Грудь:</h4>
	                                <h4 class="heading-2">2</h4>
	                            </div>
	                            <div class="item_shoes">
	                                <h4 class="heading">Обувь: </h4>
	                                <h4 class="heading-2">{{$model->foot_size}}</h4>
	                            </div>
	                        </div>
	                        <div class="item_address">
	                            
	                        </div>
	                      <div class="item_details">
	                      	<form action="{{action('CommentsController@detail', $model->user_id)}}" method="get">
								
								
		                        <button type="submit" class="details w-inline-block">
		                            <img src="{{ url('images/Vector-1.svg')}}" alt="">
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
