@extends('admin.master')
@include('admin.navbar')
@section('content')
<div class="container">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            
            {!! \Session::get('success') !!}
        </div>
    @endif
    @if (\Session::has('success2'))
        <div class="alert alert-success">
            
            {!! \Session::get('success2') !!}
        </div>
    @endif
    @if (\Session::has('success3'))
        <div class="alert alert-success">
            
            {!! \Session::get('success3') !!}
        </div>
    @endif
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Логин/почта</th>
      <th scope="col">Админ</th>
      <th scope="col">Редактировать</th>
      <th scope="col">Удалить</th>
      <th scope="col"><a class="btn btn-success" href="{{route('create')}}"><i class="fas fa-plus"></i></a></th>
    </tr>
  </thead>
  <tbody>
        @foreach($users as $user)
    <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}} </td>
          <td> 
            <div class="mid">
                  <label class="rocker rocker1">
                    <input type="checkbox" id="checkbox"  disabled=""
                      <?php if ($user->is_admin == '1') {
                          echo "checked";
                      }?>
                    >
                    <span class="switch-left">Да</span>
                    <span class="switch-right">Нет</span>
                  </label>
                </div>
          </td>
          <td><a href="{{action('UsersController@edit', $user->id)}}" class="btn btn-warning">Редактировать  <i class="fas fa-edit"></i></a></td>
          <td><a class="btn btn-danger" href="{{action('UsersController@destroy', $user->id)}}"  
                <?php if($user->id == 1){ echo "disabled"; }  ?>
            >Удалить<i class="fas fa-trash"></i></a></td>
    </tr>
        @endforeach
    
  </tbody>
</table>


</div>


@endsection
