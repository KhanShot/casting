@extends('admin.master')

@section('content')
<h1>hello</h1>
<h2>{{$model->name}}</h2>

<p>{{$model->surname}}</p>
<img src="{{ url('images',$model->images)}}" style="width: 150px; height: 150px;">

@foreach($comments as $comment)
	@if($comment->comment)
		<a tabindex="0" class="btn btn-lg btn-danger popover-dismiss" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="{{$comment->comment}}"><i class="far fa-comment-alt"></i></a>
	@endif
	
@endforeach

{{$model->id}}
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
	  <input type="hidden" name="user_rate" class="rating-value" value="{{$rating}}">
	</ul>
	
	<h2>rating: {{$rating}}</h2>
	</div>
	<input type="hidden" value="{{$page_id}}" name="page_id">
	<input type="hidden" value="{{$project_id}}" name="project_id">
	<input type="hidden" value="{{$model->id}}" name="user_id">
	 
	<div class="col-sm-4">
		<textarea class="form-control" name="comment" rows="4" id="comment"></textarea>
	</div> 
	<button class="btn btn-info" type="submit">сохранить заментку и рейтинг</button>
</form>

@endsection

