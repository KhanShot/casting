@extends('admin.master')

@include('admin.navbar')

@section('content')
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>



<!--   @foreach($projects as $value=>$project)
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
  @endforeach -->
<div class="block_project">
    <div class="container">
    	<h1 class="heading" style="padding-bottom: 20px;">Анкеты для проекта <a href="{{URL::previous()}}">{{$project_name->project_name}}</a></h1>
      <div class="w-layout-grid grid-4">
      	@foreach($projects as $value=>$project)
	    @foreach($project as $pro)
	    @endforeach
        <div class="item_project">
          <div class="info_cart">
            <div class="text-block">{{$pro->page_name}}</div>
            <div class="text-block-2 project_count">2</div>
            <div class="icon_bar_project"><a href="#" class="edit_project w-inline-block"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b04248c12c70e2139b457_edit.svg" height="19" alt=""></a><a href="#" class="delete_project w-inline-block"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b03d2e9b086a33a0f69b7_delete-button.svg" height="18" alt=""></a><a href="#" class="share_link w-inline-block"><img src="{{ asset ('images/share.svg')}}" height="19" alt=""></a></div>
          </div><a href="{{action('PageController@page', [$id = $pro->page_id,'XWpjeYebHtellefaegiunbgtwep'=> $project_name->project_id ]) }}" class="link_page">Перейти</a>
        </div>
        @endforeach
      </div>
    </div>
</div>
@endsection