@extends('admin.master')

@include('admin.navbar')

@section('content')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

<h1>{{$project_name->project_name}}</h1>
<div class="container">
  <span id="rateMe3"  class="rating-faces"></span>
</div>
	
<div class=" allpagescontainer">
		<body onload="alternate('thetable')"> 
		<table id="thetable"> 
		@foreach($projects as $project)
			<tr>
				@foreach($project as $pro)@endforeach
				<td class="page">
				<h4>Имя Страницы: <a href="{{action('PageController@page', $pro->page_id)}}">{{$pro->page_name}}/{{$pro->page_id}}</a></h4>
					@foreach($models as $model)
						<div class="page_container">
								<?php  $images = unserialize($model->images);?>
								@if($model->page_id == $pro->page_id)
														                
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
					                                <h4 class="">Имя:</h4>
					                                <h4 class="-2">{{$model->name}} {{$model->surname}}</h4>
					                            </div>
					                            <div class="item_height">
					                                <h4 class="">Рост:</h4>
					                                <h4 class="-2">{{$model->height}} см</h4>
					                            </div>
					                            
					                            <div class="item_shoes">
					                                <h4 class="">Обувь: </h4>
					                                <h4 class="-2">{{$model->foot_size}}</h4>
					                            </div>
					                        </div>
					                        <div class="item_address">
					                            <form action="{{action('ProjectController@storeNote')}}">
												  <?php $rezh_rate = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->avg('rezh_rate');
												  $produser_rate = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->avg('produser_rate');
												  $client_rate = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->avg('client_rate'); 
												  		$average = ($rezh_rate + $produser_rate + $client_rate)/3;
												  ?>

												  <div class='rating-stars'>
												   			
											    	<ul>
														<label for="input-5" class="control-label">Средний рейтинг:</label>
													    <input id="input-5" disabled="" data-size="xs"  name="rezh_rate" class="rating rating-loading" data-min="0" data-max="5"  data-step="0.1"  value="{{$average}}">
													</ul>
												  </div>

												  <div class="">
													  	<textarea class="form-control" name="comment" rows="2" id="comment"></textarea>
													  	@foreach($comment = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->where('comment',"!=", '')->get() as $comma)
															<a tabindex="0" class="btn popover-dismiss" role="button" data-toggle="popover" data-trigger="focus" title="заметка" data-content="{{$comma->comment}}"><i class="far fa-comment-alt"></i></a>
														@endforeach
												  </div>
												  
												  <input type="hidden" value="{{$pro->page_id}}" name="page_id">
												  <input type="hidden" value="{{$pro->project_id}}" name="project_id">
												  <input type="hidden" value="{{$model->user_id}}" name="user_id">
												  
												  <input type="submit" name="submit" value="Сохранить" class="btn btn-text btn-info">
												</form>
					                        </div>
					                      <div class="item_details">
					                      	<form action="{{action('CommentsController@detail', $model->user_id)}}" method="get">
												<input type="hidden" name="project_id" value="{{$pro->project_id}}">
												<input type="hidden" name="page_id" value="{{$pro->page_id}}">
												
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
								@endif
						</div>
					@endforeach	
				</td>
			</tr> 
			
		@endforeach
		</table> 

</div>

@endsection

<script>
	function alternate(id){ 
	  if(document.getElementsByTagName){  
	    var table = document.getElementById(id);   
	    var rows = table.getElementsByTagName("tr");   
	    for(i = 0; i < rows.length; i++){           
	  //manipulate rows 
	      if(i % 2 == 0){ 
	        rows[i].className = "even"; 
	      }else{ 
	        rows[i].className = "odd"; 
	      }       
	    } 
	  } 
	}

</script>