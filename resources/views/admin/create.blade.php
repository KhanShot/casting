@extends('admin.master')
<style type="text/css">
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content/Box */
  .modal-content {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 40%!important; /* Could be more or less, depending on screen size */
  }

  /* The Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>

@include('admin.navbar')
@section('content')

<h2>Добавить моделя</h2><br  />
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><br />
@endif
@if (\Session::has('success'))
<div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
</div><br />
@endif
<form method="post" action="{{url('admin')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  
  <div class="bg-gray">
    <div class="row pb-3"><!-- first row FIO-->
      <div class="col-4">
        <label class="la-label" >Имя</label>
        <input required="" type="text" placeholder="Имя" class="form-control" name="name" >
      </div>
      <div class="col-4">
        <label class="la-label">фамилия</label>
        <input required="" type="text" placeholder="Фамилия" class="form-control"  name="surname">
      </div>
      <div class="col-4">
        <label class="la-label" >Очество</label>
        <input required="" type="text" placeholder="Очество" class="form-control" name="fathersname" >
      </div>
    </div> <!-- first row  FIO-->
    <!-- contacts info -->
    <div class="row pb-3">
      <div class="col-4">
        <label class="la-label">Город</label>
        <input  type="text" name="city" placeholder="Город" class="form-control" list="city" >
        <datalist id="city">
          <option value="Алматы"></option>
          <option value="Нур-Султан"></option>
          <option value="Караганда"></option>
          <option value="Актау"></option>
          <option value="Семей"></option>
          <option value="Усткеменагорскь"></option>
          <option value="Петропавл"></option>
          <option value="Талдыкорган"></option>
        </datalist>
      </div>

        <div class="col-2">
          <label class="la-label">Адрес</label>
          <input  type="text" placeholder="Адрес" class="form-control" name="address">
        </div>
    
      
        <div class="col-2">
          <label class="la-label">Почта</label>
          <input  type="email" placeholder="Почта" class="form-control" name="email" >
        </div>
      
        <div class="col-2">
          <label class="la-label">Телефон номер</label>
          <input  type="tel" placeholder="Телефон номер" class="form-control" name="phone">
        </div>
     

      
        <div class="col-2">
        
          <div id="myModal" class="modal">

            <!-- Modal content -->
              <span class="close">&times;</span>
            <div class="modal-content" >
              <div class="col-8">
                <p><label>Вконтакте</label></p>
                <p><input type="text" class="form-control" id="vk" name="socc_vk" value="vk.com/"></p>
              </div>
              <div class="col-8">
                <p><label>Instagram</label></p>
                <p><input type="text" class="form-control" id="inst" name="socc_insta" value="instagram.com/"></p>
              </div>
              <div class="col-8">
                <p><label>Другие</label></p>
                <p><input type="text" class="form-control" id="ano" name="socc_ano" placeholder="another link here"></p>
              </div>
            </div>

          </div>
          <label id="clickact">Социальные аккаунтsы</label>
          <input id="myBtn" type="text" name="social_acc" class="form-control"  >
    
        </div>
    </div><!-- contacts info -->
    <div class="row pb-3"> <!-- rest info1 -->
        <div class="col-2">
         <label class="la-label">Тип Анкеты</label>
          <SELECT placeholder="" class="form-control" name="model_type">
            <option value="">Тип Анкеты</option>
            <option value="Актер">Актер</option>
            <option value="Профессиональный актер">Профессиональный актер</option>
            <option value="Массовка">Массовка</option>
            <option value="Без опыта">Без опыта</option>
          </SELECT>
        </div>
        <div class="col-2">
          <label class="la-label">Пол</label>
          <SELECT placeholder="" class="form-control" name="gender">
            <option value="">Пол</option>
            <option value="Мужской">Мужской</option>
            <option value="Женский">Женский</option>
          </SELECT>
        </div>
        <div class="col-2">
          <label class="la-label">Имеете загран. паспорт?</label>
          
          <SELECT placeholder="Имеете ли вы загран. паспорт?" class="form-control" name="pasport">
            <option value="Нет">Нет</option>
            <option value="Да">Да</option>
          </SELECT>
        </div>
        <div class="col-2">
          <label class="la-label">командировки в другие города и страны</label>
         
          <SELECT  class="form-control" name="can_go_abroad">

            <option value="Нет">Нет</option>
            <option value="Да">Да</option>
          </SELECT>
        </div>

        <div class="col">
           <label class="la-label">Возраст</label>
          <input  type="number" placeholder="Возраст" class="form-control" name="age">
        </div>
        <div class="col">
           <label class="la-label">Рост </label>
          <input  type="number" placeholder="Рост" class="form-control" name="height">
        </div>
        <div class="col">
           <label class="la-label">Вес </label>
          <input  type="number" placeholder="Вес" class="form-control" name="weight">
        </div>
    </div><!-- rest info1 -->
  

    <div class="row pb-3"><!-- rest info2 -->
      <div class="col">
        <label class="la-label">Тип телосложения </label> 
        <SELECT  class="form-control" name="body">
          <option value="худой">худой</option>
          <option value="нормальный">нормальный</option>
          <option value="атлетический">атлетический</option>
          <option value="в теле">в теле</option>
          <option value="полный">полный</option>
        </SELECT>
      </div>
    
   
      <div class="col">
        <label class="la-label">Размер одежды </label> 
        <SELECT  class="form-control" name="clothes_size">
          <option value="XS">XS</option>
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L  </option>
          <option value="XL">XL</option>
          <option value="XXL">XXL</option>
        </SELECT>
      </div>
      <div class="col">
        <label class="la-label">Размер обуви </label>
        <input  type="text" name="foot_size" placeholder="Размер обуви" class="form-control" list="foot_size" >
        <datalist id="foot_size">
          <option value="41"></option>
          <option value="40"></option>
          <option value="39"></option>
          <option value="38"></option>
        </datalist>
      </div>

      <div class="col">
        <label class="la-label">Тип внешности</label>
        <input  type="text" name="appearance" placeholder="выберите или напишите сами" class="form-control" list="appearance" >
        <datalist id="appearance">
          <option value="европейский"></option>
          <option value="азиатский"></option>
          <option value="евразийский"></option>
          <option value="афро"></option>
        </datalist>

      </div>

      <div class="col">
        <label class="la-label">Цвет волос</label>
        <input  type="text" name="color_hair" placeholder="выберите или напишите сами" class="form-control" list="color_hair" >
        <datalist id="color_hair">
          <option value="Брюнет"></option>
          <option value="Блондин"></option>
          <option value="Рыжий"></option>
          <option value="Шатен"></option>
          <option value="Седой"></option>
        </datalist>
      </div>
      <div class="col">
        <label class="la-label">цвет глаз</label>
        <input  type="text" name="color_eyes"  placeholder="выберите или напишите сами" class="form-control" list="color_eyes" >
        <datalist id="color_eyes">
          <option value="Карий"></option>
          <option value="Синий"></option>
          <option value="Голубой"></option>
          <option value="Чёрный"></option>
          <option value="Болотный"></option>
        </datalist>
      </div>
      <div class="col">
        <label class="la-label">Профессия</label>
        <input  type="text" placeholder="образование" class="form-control" name="profession">
      </div>
      <div class="col">
        <label class="la-label">Текущее место работы </label>
        <input  type="text" placeholder="Текущее место работы" class="form-control" name="current_work">
      </div>
    </div><!-- rest info2 -->
  </div>
  <div class="bg-ano">
    <label class="form-heading pb-3 pt-3">Дополнительные навыки</label>
      
      
    <div class="row pb-3"><!-- rest info3 -->
      
        <div class="col-3">
          
          <label for="skill_sport" class="form-text">Спорт:</label>
          <label><input type="checkbox" name="skill_sport[]" value="атлетика">атлетика</label>
          <label><input type="checkbox" name="skill_sport[]" value="плавание">плавание</label>
          <label><input type="checkbox" name="skill_sport[]" value="гольф">гольф</label>
          <label><input type="checkbox" name="skill_sport[]"  value="футбол">футбол</label>
          <label><input type="checkbox" name="skill_sport[]"  value="Настольный теннис">Настольный теннис</label>
          <input  type="text" placeholder="или укажите свой (Спорт)" class="form-control" name="skill_sport1">
        </div>
     
        <div class="col-3">
          <label for="skill_fight_art" class="form-text">Боевые искусства:</label>
          <label><input type="checkbox" name="skill_fight_art[]" value="бокс."> бокс</label>
          <label><input type="checkbox" name="skill_fight_art[]" value="тхэквондо">тхэквондо</label>
          <label><input type="checkbox" name="skill_fight_art[]" value="Карате">Карате</label>
          <label><input type="checkbox" name="skill_fight_art[]"  value="Дзюдо">Дзюдо</label>
          <label><input type="checkbox" name="skill_fight_art[]"  value="боевое самбо">боевое самбо</label>
          <input  type="text" placeholder="или укажите свой (Боевые искусства)" class="form-control" name="skill_fight_art1">
        </div>

        <div class="col-3">
          <label for="skill_dance" class="form-text">Танцы:</label>
          <label><input type="checkbox" name="skill_dance[]" value="Хип-Хоп.">Хип-Хоп</label>
          <label><input type="checkbox" name="skill_dance[]" value="Shuffle, House, ElectroDance, Tecktonik">Танго</label>
          <label><input type="checkbox" name="skill_dance[]" value="Бальные танцы">Бальные танцы</label>
          <label><input type="checkbox" name="skill_dance[]"  value="Танец живота">Танец живота</label>
          <label><input type="checkbox" name="skill_dance[]"  value="Восточный танец">Восточный танец</label>
          <input  type="text" placeholder="или укажите свой (Танцы)" class="form-control" name="skill_dance1">
        </div>
       
        <div class="col-3">
          <label for="skill_instrumental" class="form-text">Музыкальные инструменты:</label>
          <label><input type="checkbox" name="skill_instrumental[]" value="бокс.">Домбыра</label>
          <label><input type="checkbox" name="skill_instrumental[]" value="Қобыз">Қобыз</label>
          <label><input type="checkbox" name="skill_instrumental[]" value="Пиано">Пиано</label>
          <label><input type="checkbox" name="skill_instrumental[]"  value="Флейта">Флейта</label>
          <label><input type="checkbox" name="skill_instrumental[]"  value="Барабан">Барабан</label>
          <label><input type="checkbox" name="skill_instrumental[]"  value="Саксафон">Саксафон</label>
          <input  type="text" placeholder="или укажите свой (Музыкальные инструменты)" class="form-control" name="skill_instrumental1">
        </div>
    
        <div class="col-3">
          <label class="">Вокал</label> 
          <input  type="text" placeholder="Вокал" class="form-control" name="skill_vocal">
        </div>
       
        
      
        <div class="col-3">
          <label>Верховая езда </label> 
          <SELECT  class="form-control mb-3" name="skill_horse_ride">
            <option value="Отлично">Отлично</option>
            <option value="Хорошо">Хорошо</option>
            <option value="Средне">Средне</option>
            <option value="Плохо">Плохо</option>
            <option value="Очень плохо">Очень плохо</option>
          </SELECT>
        </div>
      
        <div class="col-3">
          <label>Другие навыки</label> 
          <textarea  type="text" placeholder="Другие навыки" class="form-control" name="skill_else" rows="4"></textarea>
        </div>
      
        <div class="col-3">
          <label>Знание языков (указать уровни владения)</label> 
          <input  type="text" placeholder="Знание языков (указать уровни владения)" class="form-control" name="languages">
        </div>
        <div class="col-3">
          
            <label for="skill_sport" class="form-text">Вождение автомобиля/иного транспорта:</label>
            <label><input type="checkbox" name="skill_car_ride[]" value="А - мотоциклы">А - мотоциклы</label>
            <label><input type="checkbox" name="skill_car_ride[]" value="B - легковые автомобили">B - легковые автомобили</label>
            <label><input type="checkbox" name="skill_car_ride[]" value="C - грузовые автомобили">C - грузовые автомобили</label>
            <label><input type="checkbox" name="skill_car_ride[]"  value="D - автобусы">D - автобусы</label>
            <label><input type="checkbox" name="skill_car_ride[]"  value="М - мопеды">М - мопеды</label>
          
            <input type="text" name="skill_car_ride1" class="form-control" placeholder="или укажите свой">
          
        </div>
        <div class="col-3">
            <label>Предпочтение в еде</label> 
            <input type="text" placeholder="Не обязательно" class="form-control" name="food_prefer">
          </div>
          <div class="col-3">
            <label>Аллергия</label> 
            <input type="text" placeholder="Если есть(не обязательно)" class="form-control" name="allergy">
          </div>
          <div class="col-3">
            <label>Заболевании</label> 
            <input type="text" placeholder="Если есть(не обязательно)" class="form-control" name="illness">
          </div>
    </div><!-- rest info3 -->
  </div>
  <div class="bg-gray">
  <div class="row pb-3"><!-- rest info4 -->
     <div class="col-3">
        <label>Опыт работы в кино на TV</label> 
        <input  type="text" placeholder="Опыт работы в кино на TV" class="form-control" name="job_experience_tv">
      </div>
      <div class="col-3">
        <label>Опыт работы в театре</label> 
        <input  type="text" placeholder="Опыт работы в театре" class="form-control" name="job_experience_teatr">
      </div>
   
      <div class="col-3">
        <label>О себе</label> 
        <textarea   type="text" placeholder="О себе" class="form-control" name="about_you" rows="4"></textarea>
    
      </div>
    
      <div class="col-3">
        <label for="can_naked">Готовы ли сниматься обнаженными?</label> 
        <SELECT  class="form-control mb-3" name="can_naked">
          <option value="ДА">Да</option>
          <option value="В белье">В белье</option>
          <option value="В топике">В топике</option>
          <option value="Нет">Нет</option>
        </SELECT>
      </div>

      <div class="col-3">
        <label for="have_work">Работаете ли вы?..(указать нужное)</label>
        <label><input type="checkbox" name="have_work[]" value="Aктер">Aктер</label>
        <label><input type="checkbox" name="have_work[]" value="Профессиональный актер">Профессиональный актер</label>
        <label><input type="checkbox" name="have_work[]" value="Модель">Модель</label>
      </div>

      <div class="col-3">
        <label for="will_work" class="form-text">Готовы ли вы работать?..(указать нужное):</label>
        <label><input type="checkbox" name="will_work[]" value="Модель отдельной части тела">Модель отдельной части тела</label>
        <label><input type="checkbox" name="will_work[]" value="Актер эпизода">Актер эпизода</label>
        <label><input type="checkbox" name="will_work[]" value="Актер массовых сцен">Актер массовых сцен</label>
      </div>
  </div><!-- rest info4 -->
  </div>

  <div class="bg-ano">
    <div class="row">
      
      <div class="col" >
        <label>Загрузить Фото(<small>только фото</small>)</label>
        <input  type="file" id="input-1"  name="images[]" multiple accept="image/*" data-preview-file-type="text">
      </div>
      <div class="col">
        <label>Загрузить Видео(<small>только видео</small>)</label>
        <input  type="file" id="input-2" name="videos[]" accept="video/*" multiple data-preview-file-type="text" >
      </div>
    </div>
  </div>
  <label for="input-25">Planets and Satellites</label>

    <div class="d-flex justify-content-center m-5">
      
        <button type="submit" class="btn btn-success block">Добавить модель</button>
    </div>

</form>
@endsection
