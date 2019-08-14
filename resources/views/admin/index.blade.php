@extends('admin.master')

@include('admin.navbar')
@section('content')
<div class="section">
    <div class="container">
      <div class="container_cart">
        <div class="warp_cart">
          <div class="cart">
            <div class="main_cart">
              <div class="heading_cart">Анкеты</div>
              <div class="count_cart">{{$models}}</div>
            </div>
          </div><a href="{{route('admin.create')}}" class="button_press">Добавить анкету</a></div>
        <div class="warp_cart">
          <div class="cart">
            <div class="main_cart">
              <div class="heading_cart">Списки</div>
              <div class="count_cart">{{$pages}}</div>
            </div>
          </div><a href="{{route('datatable')}}" class="button_press">сформировать борд</a></div>
      </div>
    </div>
  </div>

@endsection



