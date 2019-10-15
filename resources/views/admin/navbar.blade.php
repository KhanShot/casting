@if(Auth::check())
<div data-collapse="medium" data-animation="over-right" data-duration="400" data-doc-height="1" class="navbar other_page w-nav">
  <div class="container">
    <div class="naw_warp"><a href="{{route('index')}}" class="brand w-nav-brand"><img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d873ecaad1d4bb59dfe8754_MADEOF-LOGO.svg" height="19" alt=""></a>
      <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="{{ route('admin.create') }}">
          <img src="https://uploads-ssl.webflow.com/5d80be231edd7bf0a2cdaa83/5d874c5f08e53e19fdee6ac1_plus.svg" height="24" alt="" class="add_face">
        </a>
        <a href="{{route('datatable')}}" class="nav-link w-nav-link">Анкеты</a>
        <a href="{{route('allpages')}}" class="nav-link w-nav-link">Страницы</a>
        <a href="{{route('projects')}}" class="nav-link w-nav-link">Проекты</a>
        <div data-delay="0" class="user_down w-dropdown">
          <div class="dropdown-toggle w-dropdown-toggle"><img src="{{ asset ('images/man2.jpg')}}" height="40" width="40" alt="" class="image"></div>
          <nav class="dropdown-list w-dropdown-list">
            <a href="{{route('users')}}" class="dropdown-link w-dropdown-link">Добавить менеджера</a>
            <a href="{{route('logout')}}" class="exit w-dropdown-link">Выйти</a></nav>
        </div>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
</div>
<!-- <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
    <a href="{{route('index')}}" class="w-nav-brand">
        <img src="{{ asset('images/MADEOF-LOGO.svg') }}" width="100" alt="">
    </a>
    <nav role="navigation" class="nav-menu w-nav-menu">
        <a href="" class="link_menu">Анкеты</a>
        <a href="{{route('datatable')}}" class="link_menu">Списки</a>
        <a href="{{route('projects')}}" class="link_menu">Папки</a>
        <a href="{{route('users')}}" class="link_menu">Пользователи</a>
    </nav>
    <div class="w-nav-button">
      <div class="w-icon-nav-menu"></div>
    </div>
    <a href="{{route('logout')}}" class="link">Выйти</a>
</div>
 -->@endif