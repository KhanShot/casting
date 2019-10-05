@extends('admin.master')

@include('admin.navbar')

@section('content')
<!-- Latest compiled and minified CSS -->



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

<h3><a href="{{route('projects')}}">Папки</a>->{{$project_name->project_name}}</h3>
		<div class="container_cart">
		  @foreach($projects as $value=>$project)
		    @foreach($project as $pro)
		    @endforeach
		    <div class="warp_cart">
		      <div class="cart">
		        <div class="her">

		            <a href="#"><i class="fas fa-trash lefttop"></i></a>
		        </div>
		        <div class="main_cart">
		          <div class="heading_cart">{{$pro->page_name}}</div>
		         
		          <div class="count_cart">5</div>
		        </div>
		      </div>
		      <a href="{{action('PageController@page', [$id = $pro->page_id,'XWpjeYebHtellefaegiunbgtwep'=> $project_name->project_id ]) }}" class="button_press">Открыть страницу</a>
		    </div>
		  @endforeach
		</div>
			<!-- 	<tr>
				@foreach($project as $pro)
				@endforeach
				<td class="page">
				<h4>Имя Страницы: <a href="{{action('PageController@page', $pro->page_id)}}">{{$pro->page_name}}/{{$pro->page_id}}</a></h4>
					@foreach($models as $model)
						<?php  $images = unserialize($model->images);?>
						@if($model->page_id == $pro->page_id)
							<div class="page_container">		                
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
			                                <h4 class="-2">{{$model->name}}</h4>
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
										  <?php 
										  $rezh_rate = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->avg('rezh_rate');
										  $produser_rate = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->avg('produser_rate');
										  $client_rate = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->avg('client_rate'); 
										  $average = ($rezh_rate + $produser_rate + $client_rate)/3;

										  $admin_comment = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->where('admin_comment',"!=", '')->get();

										  ?>
										  <button class="collapsible" type="button">Open Collapsible</button>
											<div class="content">
												@foreach($admin_comment as $admin_comma)
											  		<p>{{$admin_comma->admin_comment}}</p>
											  	@endforeach

											  <input type="text" name="admin_comment" class="form-control">
											</div>
										  <div class='rating-stars'>
										   			
									    	<ul class="d-flex flex-column">
												<label for="input-5" class="control-label">Средний рейтинг:</label>
											    <span class="rating" rating="{{$average}}">
												  <span class="star "></span>
												  <span class="star "></span>
												  <span class="star"></span>
												  <span class="star"></span>
												  <span class="star"></span>
												</span>
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
			                        	
									@endif
			                      </div>
			                      
			                    </div>
							</div>
						@endif
					@endforeach	
				</td>
			</tr> 
			 -->
		

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