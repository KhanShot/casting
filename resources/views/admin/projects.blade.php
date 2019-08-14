@extends('admin.master')

@include('admin.navbar')

@section('content')


 
 
<h1>{{$project_name->project_name}}</h1>
<div class="container">
  <span id="rateMe3"  class="rating-faces"></span>
</div>
	
		@foreach($projects as $project)
			@foreach($project as $pro)
				
			@endforeach
			<big>name of page: </big><h2><a href="{{action('PageController@page', $pro->page_id)}}">{{$pro->page_name}}</a></h2>
			
			@foreach($models as $model)
				
				@if($model->page_id == $pro->page_id)
				{{$rate = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->avg('user_rate') }}
				<div></div>
				
						<a href=""><big>{{$model->user_id}}</big></a>
						
						@if($rate == '')
							<h1>RATING:0</h1>
						@endif
						<form action="{{action('ProjectController@storeNote')}}">
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
						      <input type="hidden" name="user_rate" class="rating-value" value="4">
						    </ul>
						  </div>
						  <div class="col-sm-4">
						  	<textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
						  	@foreach($comment = App\Notes::where('project_id',$model->project_id)->where('page_id',$model->page_id)->where('user_id', $model->user_id)->where('comment',"!=", '')->get() as $comma)
								<a tabindex="0" class="btn-danger popover-dismiss" role="button" data-toggle="popover" data-trigger="focus" title="заментка" data-content="{{$comma->comment}}"><i class="far fa-comment-alt"></i></a>
							@endforeach

						  </div>
						  
						  <input type="hidden" value="{{$pro->page_id}}" name="page_id">
						  <input type="hidden" value="{{$pro->project_id}}" name="project_id">
						  <input type="hidden" value="{{$model->user_id}}" name="user_id">
						  
						  <input type="submit" name="submit" value="save" class="btn btn-info">
						</form>
					<img src="{{ url('images',explode('|',$model->images)[0])}}" style="width: 150px; height: 150px;">
					<form action="{{action('CommentsController@detail', $model->user_id)}}" method="get">
						<input type="hidden" name="project_id" value="{{$pro->project_id}}">
						<input type="hidden" name="page_id" value="{{$pro->page_id}}">
						<button type="submit" class="btn btn-info">{{$model->name}}</button>
					</form>
					{{$model->user_id}}////
					
					 	<input type="hidden" value="{{$model->user_id}}" name="ids[]">

					<p>-----------------</p>
				@endif
			@endforeach		
				
		<p>--------------------</p>
		@endforeach
<p>++++++++++++++++++++++</p>

@endsection