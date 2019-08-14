@extends('admin.master')

@section('content')

<h1>{{$models[0]->page_name}}</h1>
<a href="{{route('export')}}" class="btn btn-info"> export</a>
@foreach($models as $value=>$model)
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

<h1>{{$models[0]->page_id}}</h1>
