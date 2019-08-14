@extends('admin.master')
@include('admin.navbar')



@section('content')
<div class="col-md-6 col-lg-3">
    <div class="statistic__item statistic__item--green">
        <h2 class="number"></h2>
        <span class="desc">моделей</span>
        <div>
            <a class="desc" href="{{route('admin.create')}}">go check</a>
        </div>
        <div class="icon">
            <i class="zmdi zmdi-account-o"></i>
        </div>
    </div>
    <div>
        <form class="d-none d-sm-inline-block form-inline" action="{{ route('store') }}" method="get" role="form">
        <div class="input-group">
            <input type="text" class="form-control bg-light  small" required="" placeholder="Create folder"  aria-describedby="basic-addon2" name="project_name">
            <div class="input-group-append">
            
            <button class="btn btn-primary" type="submit"><i class="fas fa-plus fa-sm"></i></button>
          </div>
        </div>
    </form>
    </div>
</div>

@foreach($projects as $value=>$project)
    @foreach($project as $pro)
    
    @endforeach
    <div class="statistic__item statistic__item--green">
        <h2 class="number"></h2>
        <span class="desc text-primary bg-warning">{{$pro->project_name}}</span>
        <div><a class="desc" href="{{action('ProjectController@projects', $pro->project_id)}}">open folder</a></div>
        <div class="icon"><i class="zmdi zmdi-account-o"></i></div>
    </div>
@endforeach


@endsection