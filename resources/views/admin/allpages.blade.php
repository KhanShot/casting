@extends('admin.master')
@include('admin.navbar')
@section('content')
 



<!-- <div class="container">
  <div class="container_cart elsecontainer_cart">
    @foreach($pages as $page)
      <div class="warp_cart">

        <div class="cart">
          <div class="main_cart">
            <div class="heading_cart" style="font-size: 15px;"> {{ $page[0]->page_name }} </div>
            <div class="count_cart"> {{ $count = DB::table('formedpage')->where('page_id', '=', $page[0]->page_id)->count('user_id') }}  </div>
          </div>
        </div><a href="{{action( 'PageController@detailpage', $page[0]->page_id) }}" class="button_press">Перейти к страницу</a>
      </div>
    @endforeach
  </div>
</div> -->
   <div class="add_project">
    <div class="container">
      <h1 class="heading-3">Список страниц</h1>
      <div class="form-block-4 w-form">
        <form  action="" class="form-3">
          <input type="text" class="text-field-6 w-input" name="project_name" placeholder="Название страниц"  required="">
          <!-- <input type="submit" value="Создать" data-wait="Please wait..." class="submit-button-6 w-button"> -->
          <a href="{{route('datatable')}}" class="submit-button-6 w-button">Создать</a>
        </form>
      </div>
    </div>
  </div>
<div class="block_project">
    <div class="container">
      <div class="w-layout-grid grid-4">
      @foreach($pages as $page)
        <div class="item_project">
          <div class="info_cart">
            <div class="text-block">{{$page[0]->page_name}}</div>
            <div class="text-block-2 project_count">{{ $count = DB::table('formedpage')->where('page_id', '=', $page[0]->page_id)->count('user_id') }}</div>
            <div class="icon_bar_project"><a href="#" class="edit_project w-inline-block"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b04248c12c70e2139b457_edit.svg" height="19" alt=""></a><a href="#" class="delete_project w-inline-block"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d8b03d2e9b086a33a0f69b7_delete-button.svg" height="18" alt=""></a><a href="#" class="share_link w-inline-block"><img src="{{ asset ('images/share.svg')}}" height="19" alt=""></a></div>
          </div><a href="#" class="link_page">Перейти</a>
        </div>
        @endforeach
      </div>
    </div>
</div>

@endsection
