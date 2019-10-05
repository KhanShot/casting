@extends('admin.master')

@section('content')
<div class="container">
    <p class="heading">Создать пользователя</p>

    <div class="container">
        <form  action="{{ action('UsersController@show') }}" >
            <div class="column">
              <div class="input_form">
                <label>Имя</label>
                <input type="text" name="name" value="" class="form-control">
              </div>
              <div class="input_form">
                <label>Почта</label>
                <input type="text" name="email" class="form-control">
              </div>
              <div class="input_form">
                <label class="label">Привелегия админа</label>
                <div class="mid">
                  <label class="rocker">
                    <input type="checkbox" id="checkbox" 
                      
                    >
                    <span class="switch-left">Да</span>
                    <span class="switch-right">Нет</span>
                  </label>
                </div>
                    <input type="hidden" name="is_admin" id="is_admin" >
                <div id="textinp">a</div>
                  

              </div>
               <label>Изменить пароль</label>
              <div class="input_form">
                <label>Введите пароль <small>(не обязательно)</small></label>
                <input type="password" name="password"  class="form-control" id="pass1" >
              </div>
              <div class="input_form">
                <label>Повторите пароль</label>
                <input type="password" name="password1" class="form-control" id="pass2" onkeyup="checkPass(); return false;" >
              </div>
              
            </div>
        </form>
    </div>
</div>
@endsection
