@extends('admin.master')
@include('admin.navbar')
@section('content')
 


<div class="d-flex"><h1 class="heading ml-5">Все страницы</h1> <p class=" ml-5 text"> <a href="{{ route('datatable') }}"> создать страницу </a></p></div>
<div class="container">
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
</div>


@endsection
