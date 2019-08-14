@extends('layouts.app')

@section('content')
<div class="form_login">
  <div class="txt_login">Панель управления</div>
  <div class="w-form">
    <form id="email-form" name="email-form" data-name="Email Form" method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" type="email" class="text-field w-input @error('email') is-invalid @enderror" placeholder="Login" required autocomplete="email" autofocus name="email" value="{{ old('email') }}" >
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input id="password" type="password" class="text-field-2 w-input" placeholder="Password" id="email" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <button type="submit"data-wait="Please wait..." class="button_login w-button">Войти</button>
    </form>
  
  </div>
</div>
@endsection
