@extends('admin.master')

@include('admin.navbar')
@section('content')

<style type="text/css">
  article {
    width: 80%;
    margin:auto;
    margin-top:10px;
}
.thumbnail {
    height: 100px;
    margin: 10px;
}
</style>
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
<div class="block_anketa">
  <form method="post" action="{{ route('admin.store')}}" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <div class="anketa_warp">
      <div class="container">
        <h1 class="heading_page">Добавить анкету</h1>
        <div class="form-block w-form">
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Имя</strong><br>
            </label>
            <input required="" type="text" class="text-field w-input" name="name" placeholder="Имя">
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Фамилия</strong><br>
            </label>
            <input required="" type="text" class="text-field w-input" name="surname" placeholder="Фамилия">
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Отчество</strong><br>
            </label>
            <input type="text" class="text-field w-input" name="fathersname" placeholder="Отчество">
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form">
      <div class="container">
        <div class="form-block w-form">
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Город</strong><br>
            </label><input type="text" class="text-field w-input" name="city" placeholder="Город">
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Адрес</strong><br>
            </label>
            <input type="text" class="text-field min_input w-input" name="address" placeholder="Адрес">
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Почта</strong><br>
            </label>
            <input required="" type="email" class="text-field min_input w-input" name="email" placeholder="Почта">
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Контактный номер</strong><br>
            </label>
            <input required="" type="text" class="text-field min_input w-input" name="phone" placeholder="Номер телефона">
          </div>
          <div class="warp_form">
            <label class="field-label" >
              <strong class="bold-text">Социальные аккаунты</strong><br>
            </label>
            <input type="text" class="text-field min_input w-input" id="social_acc" name="social_acc" placeholder="Социальные аккаунты">
            <div id="myModal" class="modal">
              <div class="modal-content">
                <div class="socials">
                  <div class="social">
                    <label class="field-label">insta</label>
                    <input type="text" id="socc_insta" class="text-field min_input w-input" name="socc_insta" value="instagram.com/">
                  </div>
                  <div  class="social">
                    <label class="field-label">Vk</label>
                    <input type="text" id="socc_vk" class="text-field min_input w-input" name="socc_vk" value="vk.com/">
                  </div>
                  <div  class="social">
                    <label class="field-label">Другое</label>
                    <input type="text" class="text-field min_input w-input" id="socc_ano" name="socc_ano" placeholder="URL here">
                  </div>
                </div>
                <span class="close">&times;</span>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form white_block">
      <div class="container">
        <div class="form-block w-form">
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Тип анкеты</strong><br>
            </label>
            <select name="model_type" class="select-field w-select">
              <option>Тип анкеты</option>
              <option value="Проф. Актер">Проф. Актер</option>
              <option value="Актер">Актер</option>
              <option value="Массовка">Массовка</option>
              <option value="Без опыта">Без опыта</option>
            </select>
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Пол</strong><br>
            </label>
            <select name="gender" class="select-field w-select">
              <option>Пол</option>
              <option value="Мужской">Мужской</option>
              <option value="Женский">Женский</option>
            </select>
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Загранпаспорт</strong><br>
            </label>
            <select name="pasport" class="select-field w-select">
              <option value="Нет">Нет</option>
              <option value="Да">Да</option>
            </select>
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Готов к командировкам</strong><br>
            </label>
            <select name="can_go_abroad" class="select-field w-select">
              <option value="Нет">Нет</option>
              <option value="Да">Да</option>
            </select>
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Возраст</strong><br>
            </label>
            <input type="number" class="text-field min_input w-input" name="age" placeholder="Возраст">
          </div>
          <div class="warp_form">
            <label class="field-label"><strong class="bold-text">Рост</strong><br>
            </label><input type="number" class="text-field min_input w-input" name="height" placeholder="Рост">
          </div>
          <div class="warp_form">
            <label class="field-label">
              <strong class="bold-text">Вес</strong><br>
            </label>
            <input type="number" class="text-field min_input w-input" name="weight" placeholder="Вес">
          </div>
        </div>
      </div>
    </div>
    <div  class="anketa_warp last_form">
      <div class="container">
        <div class="form-block w-form">
          <div class="warp_form">
            <label class="field-label"><strong class="bold-text">Тип телосложения</strong><br></label>
            <select name="body" class="select-field w-select">
              <option value="Худой">Худой</option>
              <option value="Нормальный">Нормальный</option>
              <option value="Атлетический">Атлетический</option>
              <option value="В теле">В теле</option>
              <option value="Полный">Полный</option>
            </select>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Размер одежды</strong><br></label>
            <select name="clothes_size" class="select-field w-select">
              <option value="XS">XS</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="M">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
            </select>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Размер обуви</strong><br></label>
            <input type="text" class="text-field min_input w-input" name="foot_size" placeholder="Размер обуви"  list="foot_size">
            <datalist id="foot_size">
              <option value="41"></option>
              <option value="40"></option>
              <option value="39"></option>
              <option value="38"></option>
            </datalist>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Тип внешности</strong><br></label>
            <select name="appearance" class="select-field w-select">
              <option value="Европейской">Европейской</option>
              <option value="Азиатской">Азиатской</option>
              <option value="Евразийской">Евразийской</option>
              <option value="Афра">Афра</option>
            </select>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Цвет волос</strong><br></label>
            <input  type="text" name="color_hair" placeholder="выберите или напишите сами" class="select-field w-select" list="color_hair">
            <datalist id="color_hair">
              <option value="Брюнет"></option>
              <option value="Блондин"></option>
              <option value="Рыжий"></option>
              <option value="Шатен"></option>
              <option value="Седой"></option>
            </datalist>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Цвет глаз</strong><br></label>
            <input  type="text" name="color_eyes"  placeholder="выберите или напишите сами" class="select-field w-select" list="color_eyes" >
            <datalist id="color_eyes">
              <option value="Карий"></option>
              <option value="Синий"></option>
              <option value="Голубой"></option>
              <option value="Чёрный"></option>
              <option value="Болотный"></option>
            </datalist>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Профессия</strong><br></label>
            <input type="text" class="text-field min_input w-input" name="profession" placeholder="Профессия">
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Текущее место работы</strong><br></label>
            <input type="text" class="text-field min_input w-input" name="current_work" placeholder="Текущее место работы">
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form white_block">
      <div class="container">
        <h1 class="heading_page">Дополнительные навыки</h1>
        <div class="form-block w-form">
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Спорт</strong><br></label>
            <input type="text" class="text-field min_input w-input" name="skill_sport" placeholder="Спорт">
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Боевые искусства</strong><br></label>
            <input type="text" class="text-field min_input w-input" name="skill_fight_art" placeholder="Боевые искусства">
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Танцы</strong><br></label>
            <input type="text" class="text-field min_input w-input" name="skill_dance" placeholder="Танцы">
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Музыкальные инструменты</strong><br></label>
            <input type="text" class="text-field min_input line_bat w-input" name="skill_instrumental" placeholder="Музыкальные инструменты">
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Вокал</strong><br></label>
            <input type="text" class="text-field min_input w-input" name="skill_vocal" placeholder="Вокал">
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form">
      <div class="container">
        <div class="form-block w-form">
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Верховая езда</strong><br></label>
            <select name="skill_horse_ride" class="select-field w-select">
              <option value="Отлично">Отлично</option>
              <option value="Хорошо">Хорошо</option>
              <option value="Средне">Средне</option>
              <option value="Плохо">Плохо</option>
              <option value="Очень плохо">Очень плохо</option>
            </select>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Другие навыки</strong><br></label>
            <textarea name="skill_else" maxlength="5000" placeholder="Укажите через запятую" class="textarea w-input"></textarea>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Знание языков</strong><br></label>
            <textarea name="languages" maxlength="5000" placeholder="Укажите через запятую" class="textarea w-input"></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form white_block">
      <div class="container">
        <div class="form-block w-form">
          <div class="warp_form"><label class="field-label">
            <strong class="bold-text">Водительское удостоверение</strong><br></label>
            <label class="w-checkbox"><input type="checkbox" name="skill_car_ride[]" value="А - Мотоцикл" class="w-checkbox-input">
              <span class="checkbox-label w-form-label">A - Мотоцикл</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="skill_car_ride[]" value="B - Легковые автомобили">
              <span class="checkbox-label w-form-label">B - Легковые автомобили</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="skill_car_ride[]" value="C - Грузовые автомобили">
              <span class="checkbox-label w-form-label">С - Грузовые автомобили</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="skill_car_ride[]"  value="D - Автобусы">
              <span class="checkbox-label w-form-label">D - Автобусы</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="skill_car_ride[]"  value="М - Мопеды">
              <span class="checkbox-label w-form-label">М - Мопеды</span>
            </label>
            <input type="text" class="text-field min_input transport_m w-input" name="skill_car_ride1" placeholder="Указать другое">
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Предпочтение в еде</strong><br></label>
            <textarea name="food_prefer" maxlength="5000" placeholder="Укажите через запятую" class="textarea w-input"></textarea>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Аллергия</strong><br></label>
            <textarea name="allergy" maxlength="5000" placeholder="Укажите через запятую" class="textarea w-input"></textarea>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Заболевании</strong><br></label>
            <textarea name="illness" maxlength="5000" placeholder="Укажите через запятую" class="textarea w-input"></textarea>
          </div>
          
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Опыт работы в кино на TV</strong><br></label>
            <textarea name="job_experience_tv" maxlength="5000" placeholder="Укажите через запятую" class="textarea w-input"></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form">
      <div class="container">
        <div class="form-block w-form">
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Опыт работы в театре</strong><br></label>
            <textarea name="job_experience_teatr" maxlength="5000" placeholder="Укажите через запятую" class="textarea w-input"></textarea>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">О себе</strong><br></label>
            <textarea name="about_you" maxlength="5000" placeholder="Информация о себе" class="textarea w-input"></textarea>
          </div>
          <div class="warp_form">
            <label class="field-label"><strong class="bold-text">Готовы ли сниматься обнаженными?</strong><br></label>
            <select name="can_naked" class="select-field w-select">
              <option value="Нет">Нет</option>
              <option value="Да">Да</option>
              <option value="В белье">В белье</option>
              <option value="В топике">В топике</option>
            </select>
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Работаете ли вы</strong><br></label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="have_work[]" value="Актер">
              <span class="checkbox-label w-form-label">Актер</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="have_work[]" value="Профессиональный актер">
              <span class="checkbox-label w-form-label">Профессиональный актер</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="have_work[]" value="Модель">
              <span class="checkbox-label w-form-label">Модель</span>
            </label>
            <input type="text" class="text-field min_input transport_m w-input" name="have_work1" placeholder="Указать другое">
          </div>
          <div class="warp_form"><label class="field-label"><strong class="bold-text">Готовы ли вы работать</strong><br></label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="will_work[]" value="Модель отдельной части тела">
              <span class="checkbox-label w-form-label">Модель отдельной части тела</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="will_work[]" value="Актер эпизода">
              <span class="checkbox-label w-form-label">Актер эпизода</span>
            </label>
            <label class="w-checkbox"><input type="checkbox" class="w-checkbox-input" name="will_work[]" value="Актер массовых сцен">
              <span class="checkbox-label w-form-label">Актер массовых сцен</span>
            </label>
            <input type="text" class="text-field min_input transport_m w-input" name="will_work1" placeholder="Указать другое">
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form">
      <div class="container">
        <div class="form-block w-form">
            <div class="warp_form">
              <label for="name-5" class="field-label"><strong class="bold-text">Заметка для анкеты</strong><br></label>
              <textarea name="admin_comment" maxlength="5000" placeholder="Оставьте комментарий" class="textarea w-input"></textarea>
            </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form white_block block_media">
      <div class="container">
        <div class="form-block media_block_warp w-form">
          <div>
            
            <div class="warp_form photo_warp" id="img-click"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d885761ad1d4b74ed0ab26f_photo.svg" height="70" alt="">

            </div>
            <article>
                <label for="files">Select multiple files:</label>
                <input id="files" type="file" multiple / name="images[]" style="display: none;">
                <output id="result" />
              </article>
          </div>
          <div>
            <div class="warp_form photo_warp" id="vid-click"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d885961f0c5f3b187967cf2_video-file.svg" height="70" alt=""></div>
            <article>
                <label for="files_vid">Select multiple files:</label>
                <input id="files_vid" type="file" multiple="multiple"  name="videos[]" / style="display: none;">
                <output id="resultvid" />
              </article>
          </div>
        </div>
      </div>
    </div>
    <div class="anketa_warp last_form white_block block_media">
      <div class="container">
        <div class="form-block media_block_warp w-form">
          <input type="submit" value="Добавить анкету" data-wait="Please wait..." class="submit-button w-button">
        </div>
      </div>
    </div>
  </form>
</div>

      

<script type="text/javascript">
  $( document ).ready(function() {

    $( "#social_acc" ).on( "focus", function() {
      var modal = document.getElementById("myModal");
      var span = document.getElementsByClassName("close")[0];
      modal.style.display = "block";
      span.onclick = function() {
        modal.style.display = "none";
        var socc_insta = $('#socc_insta').val();
        var socc_vk = $('#socc_vk').val();
        var socc_ano = $('#socc_ano').val();  
        var string = socc_insta + "," + socc_vk + "," + socc_ano; 
        $('#social_acc').val(string);
      }
    });
    $( "#img-click" ).on( "click", function() {
      $('#files').click();
    });
    $( "#vid-click" ).on( "click", function() {
      $('#files_vid').click();
    });
  });
</script>
@endsection
