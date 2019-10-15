@extends('admin.master')

@include('admin.navbar')
@section('content')
<div class="content">
  <div class="block_main_content">
    <div class="container">
      <div class="item_cart_warp">
        <div class="item_cart">
          <div class="info_cart">
            <div class="text-block">Анкеты</div>
            <div class="text-block-2">{{$models}}</div>
          </div>
          <div class="text-block-3"><a href="{{route('datatable')}}">Перейти</a></div>
        </div>
        <div class="item_cart">
          <div class="info_cart">
            <div class="text-block">СТРАНИЦЫ<br></div>
            <div class="text-block-2">{{$pages}}</div>
          </div>
          <div class="text-block-3"><a href="{{route('allpages')}}">Перейти</a></div>
        </div>
        <div class="item_cart">
          <div class="info_cart">
            <div class="text-block">Проекты</div>
            <div class="text-block-2">5</div>
          </div>
          <div class="text-block-3"><a href="{{route('projects')}}">Перейти</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="section">
    <div class="container">
      <div class="container_cart elsecontainer_cart">
        <div class="warp_cart">
          <div class="cart">
            <div class="main_cart">
              <div class="heading_cart">Анкеты</div>
              <div class="count_cart">{{$models}}</div>
            </div>
          </div><a href="{{route('admin.create')}}" class="button_press">Добавить анкету</a>
        </div>
        <div class="warp_cart">
          <div class="cart">
            <div class="main_cart">
              <div class="heading_cart">Страницы</div>
              <div class="count_cart">{{$pages}}</div>
            </div>
          </div><a href="{{route('allpages')}}" class="button_press">Перейти к страницам</a>
        </div>

        <div class="warp_cart">
          <div class="cart">
            <div class="main_cart">
              <div class="heading_cart">Списки</div>
              <div class="count_cart">{{$pages}}</div>
            </div>
          </div><a href="{{route('datatable')}}" class="button_press">Сформировать борд</a>
        </div>
      </div>
    </div>
  </div> -->

@endsection



