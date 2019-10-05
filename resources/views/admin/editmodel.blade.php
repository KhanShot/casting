@extends('admin.master')
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
<form method="POST" action="{{route('update', $model->id)}}" enctype="multipart/form-data">
  {{csrf_field()}}

  <div class="bg-gray">
    <div class="row pb-3"><!-- first row FIO-->
      <div class="col-4">
        <label class="label">Имя</label>
        <input required="" type="text" placeholder="Имя" class="form-control" name="name"  value="{{$model->name}}">
      </div>
      <div class="col-4">
        <label class="label">Фамилия</label>
        <input required="" type="text" placeholder="Фамилия" class="form-control"  name="surname" value="{{$model->surname}}">
      </div>
      <div class="col-4">
        <label class="label">Очество</label>
        <input  type="text" placeholder="Очество" class="form-control" name="fathersname"  value="{{$model->fathersname}}">
      </div>
    </div> <!-- first row  FIO-->
    <!-- contacts info -->
    <div class="row pb-3">
      <div class="col-4">
        <label class="label">Адрес</label>
        <input  type="text" name="city" placeholder="Город" class="form-control" list="city"  value="{{$model->city}}" >
        <datalist id="city">
          <option value="Алматы">
          <option value="Нур-Султан">
          <option value="Караганда">
          <option value="Актау">
          <option value="Семей">
          <option value="Усткеменагорскь">
          <option value="Петропавл">
          <option value="Талдыкорган">
        </datalist>
      </div>

        <div class="col-2">
          <label class="label">Адрес</label>
          <input  type="text" placeholder="Адрес" class="form-control" name="address" value="{{$model->address}}">
        </div>
    
      
        <div class="col-2">
          <label class="label">Почта</label>
          <input  type="email" placeholder="Почта" class="form-control" name="email"  value="{{$model->email}}">
        </div>
      
        <div class="col-2">
          <label class="label">Телефон номер</label>
          <input  type="tel" placeholder="Телефон номер" class="form-control" name="phone" value="{{$model->phone}}">
        </div>
     

      
        <div class="col-2">
          <label class="label">социальные аккаунты</label>
          <input  type="text" name="social_acc" placeholder="социальные аккаунты, через запятую" class="form-control" list="social_acc" multiple  value="{{$model->social_acc}}">
          <datalist id="social_acc">
            <option value="instagram.com/">
            <option value="vk.com/">
          </datalist>
        </div>
    </div><!-- contacts info -->
    <div class="row pb-3"> <!-- rest info1 -->
        <div class="col-2">
         <label class="la-label"> Тип Анкеты</label>
          <SELECT placeholder="" class="form-control" name="model_type" >

            <option value="">Тип Анкеты</option>

            <option value="Актер" 
              <?php if ($model->model_type=='Актер') {
                echo "selected";
              } ?>
            >Актер</option>
            <option value="Массовка"
              <?php if ($model->model_type=='Массовка') {
                echo "selected";
              } ?>
            >Массовка</option>
          </SELECT>
        </div>
        <div class="col-2">
          <label class="la-label">Пол</label>
          <SELECT placeholder="" class="form-control" name="gender">
            <option value="">Пол</option>
            <option value="Мужской"
              <?php if ($model->gender=='Мужской') {
                echo "selected";
              } ?>
            >Мужской</option>
            <option value="Женский"
              <?php if ($model->gender=='Женский') {
                echo "selected";
              } ?>
            >Женский</option>
          </SELECT>
        </div>
        <div class="col-2">
          <label class="la-label">Имеете загран. паспорт?</label>
          <SELECT placeholder="Имеете ли вы загран. паспорт?" class="form-control" name="pasport">
            <option value="Нет"
              <?php if ($model->pasport=='Нет') {
                echo "selected";
              } ?>
            >Нет</option>
            <option value="Да"
              <?php if ($model->pasport=='Да') {
                echo "selected";
              } ?>
            >Да</option>
          </SELECT>
        </div>
        <div class="col-2">
          <label class="la-label">командировки в другие города и страны</label>
         
          <SELECT  class="form-control" name="can_go_abroad">

            <option value="Нет"
              <?php if ($model->can_go_abroad=='Нет') {
                echo "selected";
              } ?>
            >Нет</option>
            <option value="Да"
              <?php if ($model->can_go_abroad=='Да') {
                echo "selected";
              } ?>
            >Да</option>
          </SELECT>
        </div>

        <div class="col">
           <label class="la-label">Возраст</label>
          <input  type="number" placeholder="Возраст" class="form-control" name="age" value="{{$model->age}}">
        </div>
        <div class="col">
           <label class="la-label">Рост </label>
          <input  type="number" placeholder="Рост" class="form-control" name="height" value="{{$model->height}}">
        </div>
        <div class="col">
           <label class="la-label">Вес</label>
          <input  type="number" placeholder="Вес" class="form-control" name="weight" value="{{$model->weight}}">
        </div>
    </div><!-- rest info1 -->
  

    <div class="row pb-3"><!-- rest info2 -->
      <div class="col">
        <label class="la-label">Тип телосложения </label> 
        <SELECT  class="form-control" name="body">
          <option value="худой"
            <?php if ($model->body=='худой') {
                echo "selected";
              } ?>
          >худой</option>
          <option value="нормальный"
            <?php if ($model->body=='нормальный') {
                echo "selected";
              } ?>
          >нормальный</option>
          <option value="атлетический"
            <?php if ($model->body=='атлетический') {
                echo "selected";
              } ?>
          >атлетический</option>
          <option value="в теле"
            <?php if ($model->body=='в теле') {
                echo "selected";
              } ?>
          >в теле</option>
          <option value="полный"
            <?php if ($model->body=='полный') {
                echo "selected";
              } ?>
          >полный</option>
        </SELECT>
      </div>
    
   
      <div class="col">
        <label class="la-label">Размер одежды </label> 
        <SELECT  class="form-control" name="clothes_size">
          <option value="XS"
            <?php if ($model->clothes_size=='XS') {
                echo "selected";
              } ?>
          >XS</option>
          <option value="S"
            <?php if ($model->clothes_size=='S') {
                echo "selected";
              } ?>
          >S</option>
          <option value="M"
            <?php if ($model->clothes_size=='M') {
                echo "selected";
              } ?>
          >M</option>
          <option value="L"
            <?php if ($model->clothes_size=='L') {
                echo "selected";
              } ?>
          >L  </option>
          <option value="XL"
            <?php if ($model->clothes_size=='XL') {
                echo "selected";
              } ?>
          >XL</option>
          <option value="XXL"
            <?php if ($model->clothes_size=='XXL') {
                echo "selected";
              } ?>
          >XXL</option>
        </SELECT>
      </div>
      <div class="col">
        <label class="la-label">Размер обуви </label>
        <input  type="text" name="foot_size" placeholder="Размер обуви" class="form-control" list="foot_size" value="{{$model->foot_size}}" >
        <datalist id="foot_size">
          <option value="41">
          <option value="40">
          <option value="39">
          <option value="38">
        </datalist>
      </div>

      <div class="col">
        <label class="la-label">Тип внешности</label>
        <input  type="text" name="appearance" placeholder="выберите или напишите сами" class="form-control" list="appearance" value="{{$model->appearance}}">
        <datalist id="appearance">
          <option value="европейский">
          <option value="азиатский">
          <option value="евразийский">
          <option value="афро">
      </div>

      <div class="col">
        <label class="la-label">Цвет волос</label>
        <input  type="text" name="color_hair" placeholder="выберите или напишите сами" class="form-control" list="color_hair" value="{{$model->color_hair}}" >
        <datalist id="color_hair">
          <option value="Брюнет">
          <option value="Блондин">
          <option value="Рыжий">
          <option value="Шатен">
          <option value="Седой">
      </div>
      <div class="col">
        <label class="la-label">цвет глаз</label>
        <input  type="text" name="color_eyes"  placeholder="выберите или напишите сами" class="form-control" list="color_eyes" value="{{$model->color_eyes}}">
        <datalist id="color_eyes">
          <option value="Карий">
          <option value="Синий">
          <option value="Голубой">
          <option value="Чёрный">
          <option value="Болотный">
      </div>
      <div class="col">
        <label class="la-label">Профессия</label>
        <input  type="text" placeholder="образование" class="form-control" name="profession" value="{{$model->profession}}">
      </div>
      <div class="col">
        <label class="la-label">Текущее место работы </label>
        <input  type="text" placeholder="Текущее место работы" class="form-control" name="current_work" value="{{$model->current_work}}">
      </div>
    </div><!-- rest info2 -->
  </div>
  <div class="bg-ano">
    <label class="form-heading pb-3 pt-3">Дополнительные навыки</label>
      
      
    <div class="row pb-3"><!-- rest info3 -->
      
        <div class="col-3">
          
          <label for="skill_sport" class="form-text">Спорт:</label>
          <label><input type="checkbox" name="skill_sport[]"  value="атлетика" 
              <?php 
                if (strpos($model->skill_sport, 'атлетика') !== false) {
                    echo 'checked';
                }
              ?>
           >атлетика</label>
          <label><input type="checkbox" name="skill_sport[]" value="плавание"
              <?php 
                if (strpos($model->skill_sport, 'плавание') !== false) {
                    echo 'checked';
                }
              ?>
            >плавание</label>
          <label><input type="checkbox" name="skill_sport[]" value="гольф"
              <?php 
                if (strpos($model->skill_sport, 'гольф') !== false) {
                    echo 'checked';
                }
              ?>
            >гольф</label>
          <label><input type="checkbox" name="skill_sport[]"  value="футбол"
              <?php 
                if (strpos($model->skill_sport, 'футбол') !== false) {
                    echo 'checked';
                }
              ?>
            >футбол</label>
          <label><input type="checkbox" name="skill_sport[]"  value="Настольный теннис"
              <?php 
                if (strpos($model->skill_sport, 'Настольный теннис') !== false) {
                    echo 'checked';
                }
              ?>
            >Настольный теннис</label>
          <input  type="text" placeholder="или укажите свой (Спорт)" class="form-control" name="skill_sport1" >
        </div>
     
        <div class="col-3">
          <label for="skill_fight_art" class="form-text">Боевые искусства:</label>
          <label><input type="checkbox" name="skill_fight_art[]" value="бокс"
              <?php 
                if (strpos($model->skill_fight_art, 'бокс') !== false) {
                    echo 'checked';
                }
              ?>
            > бокс</label>
          <label><input type="checkbox" name="skill_fight_art[]" value="Таэквондо"
              <?php 
                if (strpos($model->skill_fight_art, 'Таэквондо') !== false) {
                    echo 'checked';
                }
              ?>
            >Таэквондо</label>
          <label><input type="checkbox" name="skill_fight_art[]" value="Карате"
              <?php 
                if (strpos($model->skill_fight_art, 'Карате') !== false) {
                    echo 'checked';
                }
              ?>
            >Карате</label>
          <label><input type="checkbox" name="skill_fight_art[]"  value="Дзюдо"
              <?php 
                if (strpos($model->skill_fight_art, 'Дзюдо') !== false) {
                    echo 'checked';
                }
              ?>
            >Дзюдо</label>
          <label><input type="checkbox" name="skill_fight_art[]"  value="боевое самбо"
              <?php 
                if (strpos($model->skill_fight_art, 'боевое самбо') !== false) {
                    echo 'checked';
                }
              ?>
            >боевое самбо</label>
          <input  type="text" placeholder="или укажите свой (Боевые искусства)" class="form-control" name="skill_fight_art1">
        </div>

        <div class="col-3">
          <label for="skill_dance" class="form-text">Танцы:</label>
          <label><input type="checkbox" name="skill_dance[]" value="Хип-Хоп"
              <?php 
                if (strpos($model->skill_dance, 'Хип-Хоп') !== false) {
                    echo 'checked';
                }
              ?>
            >Хип-Хоп</label>
          <label><input type="checkbox" name="skill_dance[]" value="Танго"
              <?php 
                if (strpos($model->skill_dance, 'Танго') !== false) {
                    echo 'checked';
                }
              ?>
            >Танго</label>
          <label><input type="checkbox" name="skill_dance[]" value="Бальные танцы"
              <?php 
                if (strpos($model->skill_dance, 'Бальные танцы') !== false) {
                    echo 'checked';
                }
              ?>
            >Бальные танцы</label>
          <label><input type="checkbox" name="skill_dance[]"  value="Танец живота"
              <?php 
                if (strpos($model->skill_dance, 'Танец живота') !== false) {
                    echo 'checked';
                }
              ?>
            >Танец живота</label>
          <label><input type="checkbox" name="skill_dance[]"  value="Восточный танец"
              <?php 
                if (strpos($model->skill_dance, 'Восточный танец') !== false) {
                    echo 'checked';
                }
              ?>
            >Восточный танец</label>
          <input  type="text" placeholder="или укажите свой (Танцы)" class="form-control" name="skill_dance1" >
        </div>
       
        <div class="col-3">
          <label for="skill_instrumental" class="form-text">Музыкальные инструменты:</label>
          <label><input type="checkbox" name="skill_instrumental[]" value="Домбыра"
              <?php 
                if (strpos($model->skill_instrumental, 'Домбыра') !== false) {
                    echo 'checked';
                }
              ?>
            >Домбыра</label>
          <label><input type="checkbox" name="skill_instrumental[]" value="Қобыз"
              <?php 
                if (strpos($model->skill_instrumental, 'Қобыз') !== false) {
                    echo 'checked';
                }
              ?>
            >Қобыз</label>
          <label><input type="checkbox" name="skill_instrumental[]" value="Пиано"
              <?php 
                if (strpos($model->skill_instrumental, 'Пиано') !== false) {
                    echo 'checked';
                }
              ?>
            >Пиано</label>
          <label><input type="checkbox" name="skill_instrumental[]"  value="Флейта"
              <?php 
                if (strpos($model->skill_instrumental, 'Флейта') !== false) {
                    echo 'checked';
                }
              ?>
            >Флейта</label>
          <label><input type="checkbox" name="skill_instrumental[]"  value="Барабан"
              <?php 
                if (strpos($model->skill_instrumental, 'Барабан') !== false) {
                    echo 'checked';
                }
              ?>
            >Барабан</label>
          <label><input type="checkbox" name="skill_instrumental[]"  value="Саксафон"
              <?php 
                if (strpos($model->skill_instrumental, 'Саксафон') !== false) {
                    echo 'checked';
                }
              ?>
            >Саксафон</label>
          <input  type="text" placeholder="или укажите свой (Музыкальные инструменты)" class="form-control" name="skill_instrumental1">
        </div>
    
        <div class="col-3">
          <label class="">Вокал</label> 
          <input  type="text" placeholder="Вокал" class="form-control" name="skill_vocal" value="{{$model->skill_vocal}}">
        </div>
       
        <div class="col-3">
          <label for="skill_sport" class="form-text">Вождение автомобиля/иного транспорта:</label>
          <label><input type="checkbox" name="skill_car_ride[]" value="А - мотоциклы"
              <?php 
                if (strpos($model->skill_car_ride, 'А - мотоциклы') !== false) {
                    echo 'checked';
                }
              ?>

            >А - мотоциклы</label>
          <label><input type="checkbox" name="skill_car_ride[]" value="B - легковые автомобили"
              <?php 
                if (strpos($model->skill_car_ride, 'B - легковые автомобили') !== false) {
                    echo 'checked';
                }
              ?>
            >B - легковые автомобили</label>
          <label><input type="checkbox" name="skill_car_ride[]" value="C - грузовые автомобили"
              <?php 
                if (strpos($model->skill_car_ride, 'C - грузовые автомобили') !== false) {
                    echo 'checked';
                }
              ?>
            >C - грузовые автомобили</label>
          <label><input type="checkbox" name="skill_car_ride[]"  value="D - автобусы"
              <?php 
                if (strpos($model->skill_car_ride, 'D - автобусы') !== false) {
                    echo 'checked';
                }
              ?>
            >D - автобусы</label>
          <label><input type="checkbox" name="skill_car_ride[]"  value="М - мопеды"
              <?php 
                if (strpos($model->skill_car_ride, 'М - мопеды') !== false) {
                    echo 'checked';
                }
              ?>
            >М - мопеды</label>
          
          
        </div>
      
        <div class="col-3">
          <label>Верховая езда </label> 
          <SELECT  class="form-control mb-3" name="skill_horse_ride">
            <option value="Отлично"
              <?php 
                if (strpos($model->skill_horse_ride, 'Отлично') !== false) {
                    echo 'selected';
                }
              ?>
            >Отлично</option>
            <option value="Хорошо"
              <?php 
                if (strpos($model->skill_horse_ride, 'Хорошо') !== false) {
                    echo 'selected';
                }
              ?>
            >Хорошо</option>
            <option value="Средне"
              <?php 
                if (strpos($model->skill_horse_ride, 'Средне') !== false) {
                    echo 'selected';
                }
              ?>
            >Средне</option>
            <option value="Плохо"
              <?php 
                if (strpos($model->skill_horse_ride, 'Плохо') !== false) {
                    echo 'selected';
                }
              ?>
            >Плохо</option>
            <option value="Очень плохо"
              <?php 
                if (strpos($model->skill_horse_ride, 'Очень плохо') !== false) {
                    echo 'selected';
                }
              ?>
            >Очень плохо</option>
          </SELECT>
        </div>
      
        <div class="col-3">
          <label>Другие навыки</label> 
          <input  type="text" placeholder="Другие навыки" class="form-control" name="skill_else" value="{{$model->skill_else}}">
        </div>
      
        <div class="col-3">
          <label>Знание языков (указать уровни владения)</label> 
          <input  type="text" placeholder="Знание языков (указать уровни владения)" class="form-control" name="languages" value="{{$model->languages}}">
        </div>
        <div class="col-3">
          <label>Предпочтение в еде</label> 
          <input  type="text" placeholder="Предпочтение в еде" class="form-control" name="food_prefer" value="{{$model->food_prefer}}">
        </div>
        <div class="col-3">
          <label>Аллергия</label> 
          <input  type="text" placeholder="Аллергия" class="form-control" name="allergy" value="{{$model->allergy}}">
        </div>
        <div class="col-3">
          <label>Заболевании</label> 
          <input  type="text" placeholder="Заболевании" class="form-control" name="illness" value="{{$model->illness}}">
        </div>
    </div><!-- rest info3 -->
  </div>
  <div class="bg-gray">
    
  <div class="row pb-3"><!-- rest info4 -->
     <div class="col-3">
      <label>Опыт работы в кино на TV</label> 
        <input  type="text" placeholder="Опыт работы в кино на TV" class="form-control" name="job_experience_tv" value="{{$model->job_experience_tv}}">
      </div>
      <div class="col-3">
        <label>Опыт работы в театре</label> 
        <input  type="text" placeholder="Опыт работы в театре" class="form-control" name="job_experience_teatr" value="{{$model->job_experience_teatr}}">
      </div>
   
      <div class="col-3">
        <label>О себе</label> 
        <textarea   type="text" placeholder="О себе " class="form-control" name="about_you">{{$model->about_you}}</textarea>
    
      </div>
    
      <div class="col-3">
        <label for="can_naked">Готовы ли сниматься обнаженными?</label> 
        <SELECT  class="form-control mb-3" name="can_naked">
          <option value="ДА"  
            <?php 
                if (strpos($model->can_naked, 'ДА') !== false) {
                    echo 'selected';
                }
              ?>
          >Да</option>
          <option value="Нет"
            <?php 
                if (strpos($model->can_naked, 'Нет') !== false) {
                    echo 'selected';
                }
              ?>
          >Нет</option>
        </SELECT>
      </div>

      <div class="col-3">
        <label for="have_work">Работаете ли вы?..(указать нужное)</label>
        <label><input type="checkbox" name="have_work[]" value="Aктер"
            <?php 
                if (strpos($model->have_work, 'Aктер') !== false) {
                    echo 'checked';
                }
              ?>
          >Aктер</label>
        <label><input type="checkbox" name="have_work[]" value="Профессиональный актер"
            <?php 
                if (strpos($model->have_work, 'Профессиональный актер') !== false) {
                    echo 'checked';
                }
              ?>
          >Профессиональный актер</label>
        <label><input type="checkbox" name="have_work[]" value="Модель"
            <?php 
                if (strpos($model->have_work, 'Модель') !== false) {
                    echo 'checked';
                }
              ?>
          >Модель</label>
      </div>

      <div class="col-3">
        <label for="will_work" class="form-text">Готовы ли вы работать?..(указать нужное):</label>
        <label><input type="checkbox" name="will_work[]" value="Модель отдельной части тела"
            <?php 
                if (strpos($model->will_work, 'Модель отдельной части тела') !== false) {
                    echo 'checked';
                }
              ?>
          >Модель отдельной части тела</label>
        <label><input type="checkbox" name="will_work[]" value="Актер эпизода"
            <?php 
                if (strpos($model->will_work, 'Актер эпизода') !== false) {
                    echo 'checked';
                }
              ?>
          >Актер эпизода</label>
        <label><input type="checkbox" name="will_work[]" value="Актер массовых сцен"
            <?php 
                if (strpos($model->will_work, 'Актер массовых сцен') !== false) {
                    echo 'checked';
                }
              ?>
          >Актер массовых сцен</label>
      </div>
  </div><!-- rest info4 -->
  </div>

  <div class="bg-ano">
    
    <div class="row">
      
      <div class="col" >
        <label>Загрузить Фото</label>
        <input type="file" id="file-1" name="images[]" multiple=""  data-browse-on-zone-click="true"  data-preview-file-type="text" >
        
      </div>
      <div class="col">
        <label>Загрузить Видео</label>
        <input type="file" id="file-2" name="videos[]" multiple="" >
        
      </div>
    </div>
  </div>
  <label for="input-25">Planets and Satellites</label>

    <div class="d-flex justify-content-center m-5">
    
        <button type="submit" class="btn btn-success block">Редактировать моделя</button>
    </div>
</form>
<div class="row">
      <label>редактирование фотографии</label>
      <div class="gallery-image">
        <?php
          $images = unserialize($model->images);
          $_SESSION['images']  = $images;
          $imgs = implode( ", ", $_SESSION['images']);
          if (count($images) == 0) {
            ?>
              <div class="form-heading col alert alert-warning alert-dismissible fade show">
                  Пока нет Фоток
              </div>
            <?php
          }
         foreach ($images as $image)  {?>
          
          
        <div class="img-box">
          <img src="{{ url('images',$image )}}" alt="" />
          <div class="transparent-box">
            <div class="caption">
                <form method="get" action="{{ route('deleteImage', $model->id ) }}">
                  {{csrf_field()}}
                  <input type="hidden" name="imagess" value="<?php echo $imgs;?>">
                  <input type="submit" class="btn btn-danger" value="удалить фотку"> 
                  <input type="hidden" name="image" value="<?php echo $image;?>"> 
                </form>               
            </div>
          </div> 
        </div>
      <?php } ?>
      </div>
</div>
<div class="row">
      <label>редактирование Видео</label>
      
        <div id="videosList">  
        <?php
          $videos = unserialize($model->videos);
          $_SESSION['videos']  = $videos;
          $vids = implode( ", ", $_SESSION['videos']);
          if (count($videos) == 0) {
            ?>
              <div class="form-heading col alert alert-warning alert-dismissible fade show">
                  Пока нет видео
              </div>
            <?php
          }
         foreach ($videos as $video)  {?>
            
            <div class="video">
                <video class="thevideo" loop >
                  <source src="{{ url('images',$video )}}" type="video/mp4">
                  
                </video>
                <div class="captions">
                    <form method="get" action="{{ route('deleteVideo', $model->id ) }}">
                      {{csrf_field()}}
                      <input type="hidden" name="videoss" value="<?php echo $vids;?>">
                      <input type="submit" class="btn btn-danger" value="удалить Видео">
                      <input type="hidden" name="video" value="<?php echo $video;?>"> 
                    </form>               
                  </div>
              </div>
              
            
        
          <?php } ?>
        </div>

        <div class="pt-5 pb-5 mt-5 mb-5">
          
        </div>
</div>
@endsection
