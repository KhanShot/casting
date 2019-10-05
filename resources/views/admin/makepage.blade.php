@extends('admin.master')
@include('admin.navbar')



@section('content')
    <div>
        <form class="d-none d-sm-inline-block form-inline" action="{{ route('store') }}" method="get" role="form">
            <div class="input-group">
                <input type="text" class="form-control bg-light  small" required="" placeholder="Создать проект"  aria-describedby="basic-addon2" name="project_name">
                <div class="input-group-append">
                
                <button class="btn btn-primary" type="submit"><i class="fas fa-plus fa-sm"></i></button>
              </div>
            </div>
        </form>
    </div>
<div class="container_cart">
  @foreach($projects as $value=>$project)
    @foreach($project as $pro)
    @endforeach
    <div class="warp_cart">
      <div class="cart">
        <div class="her">

            <a href="{{action('ProjectController@destroy', $pro->project_name)}}"><i class="fas fa-trash lefttop"></i></a>
        </div>
        <div class="main_cart">
          <div class="heading_cart">{{$pro->project_name}}</div>
          <?php $counted = $projectss->where('project_id', '=', $pro->project_id)->count('project_id'); 
           ?>
          <div class="count_cart">{{$counted}} </div>
        </div>
      </div>
      <a href="{{action('ProjectController@projects', $pro->project_id)}}" class="button_press">Открыть проект</a>
    </div>
  @endforeach
</div>

@endsection