@if(Auth::check())
@extends('admin.master')
<div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
    <a href="{{route('index')}}" class="w-nav-brand">
        <img src="{{ asset('images/MADEOF-LOGO.svg') }}" width="100" alt="">
    </a>
    <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="{{route('admin.create')}}" class="link_menu">Анкеты</a>
        <a href="{{route('datatable')}}" class="link_menu">Списки</a>
        <a href="{{route('projects')}}" class="link_menu">Папки</a>
    </nav>
    <div class="w-nav-button">
      <div class="w-icon-nav-menu"></div>
    </div>
    <a href="{{route('logout')}}" class="link">Выйти</a>
</div>

@endif