@extends('admin.master')
@include('admin.navbar')

@section('content')
<h1>test</h1>
@foreach($models as $model)
	<p>{{$model->name}}///{{$model->surname}}</p>
	<p>{{$model->color_eyes}}</p>
	<p>------------------------</p>
	

@endforeach
@endsection