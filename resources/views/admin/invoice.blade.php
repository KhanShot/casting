<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style type="text/css"  media="all">
  body {
    font-family: DejaVu Sans;
  }
  .row{
    display: flex;
  }
  .col{
    padding: 5px;
  }

</style>
</head>
<?php  $images = unserialize($model->images);?>
<?php  $videos = unserialize($model->videos);?>
  


<body>  
  <div class="section">
    <div style="display: flex; flex-direction: row; justify-content: space-around;"><h1>Model/1</h1><img src="{{ url('images', $images[0]) }}" width="180"></div>
      
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ФИО</th>
      <th scope="col">{{$model->name}}</th>
      <th scope="col">{{$model->surname}}</th>
      <th scope="col">{{$model->fathersname}}</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td scope="row">Город: {{$model->city}}</td>
      <td>Адрес: {{$model->address}}</td>
      <td>Почта: {{$model->email}}</td>
      <td >Телефон номер: {{$model->phone}}</td>
    </tr>
    <tr>
      <td scope="row">Соц Аккаунты: {{$model->social_acc}}</td>
      <td>Тип анкеты: {{$model->model_type}}</td>
      <td>Пол: {{$model->gender}}</td>
      <td>Загран Паспорт: {{$model->pasport}}</td>
    </tr>
    <tr>
      <td scope="row">Возраст: {{$model->age}}</td>
      <td>Рост: {{$model->height}}</td>
      <td>Вес: {{$model->weight}}</td>
      <td>Тип телосложения: {{$model->body}}</td>
    </tr>
    <tr>
      <td scope="row">Размер одежды: {{$model->clothes_size}}</td>
      <td>Размер обуви: {{$model->foot_size}}</td>
      <td>Тип внешности: {{$model->appearance}}</td>
      <td>Цвет волос: {{$model->color_hair}}</td>
    </tr>
    <tr>
      <td scope="row">Цвет Глаз: {{$model->color_eyes}}</td>
      <td>Профессия: {{$model->profession}}</td>
      <td>Текущее место работы: {{$model->current_work}}</td>
      
    </tr>
    <tr>
      <td scope="row">Возраст: {{$model->age}}</td>
      <td>Рост: {{$model->height}}</td>
      <td>Вес: {{$model->weight}}</td>
      <td>Тип телосложения: {{$model->body}}</td>
    </tr>
  </tbody>
</table>



  </div>
</body>

</html>
