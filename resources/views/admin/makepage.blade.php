@extends('admin.master')
@include('admin.navbar')
@section('content')
<div class="container-90">
  <div class="add_project">
    <div class="container">
      <h1 class="heading-3">Список проектов</h1>
      <div class="form-block-4 w-form">
        <form  action="{{route('project.store')}}" class="form-3">
          <input type="text" class="text-field-6 w-input" name="project_name" placeholder="Название проекта"  required="">
          <input type="submit" value="Создать" data-wait="Please wait..." class="submit-button-6 w-button">
        </form>
      </div>
    </div>
  </div>
  <div class="block_project">
    <div class="container">
      <div class="w-layout-grid grid-4">
        @foreach($projects as $projectss)
        @foreach($projectss as $project)
        @endforeach
          <div class="item_project">
            <div class="info_cart">
              <div class="text-block">{{$project->project_name}}</div>
              <div class="text-block-2 project_count">30</div>
              <div class="icon_bar_project"><a href="#" class="edit_project w-inline-block"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b04248c12c70e2139b457_edit.svg" height="19" alt=""></a><a href="#" class="delete_project w-inline-block"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b03d2e9b086a33a0f69b7_delete-button.svg" height="18" alt=""></a><a href="#" class="share_link w-inline-block"><img src="{{ asset ('images/share.svg')}}" height="19" alt=""></a></div>
            </div><a href="{{action('ProjectController@projects', $project->project_id)}}" class="link_page">Перейти</a>
          </div>
        @endforeach
      </div>
    </div>
  </div>  

</div>

<!-- <div>
    <form class="d-none d-sm-inline-block form-inline" action="{{ route('project.store') }}" method="get" role="form">
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
 -->
@endsection