<header class="c-navbar u-mb-medium">
    <button class="c-sidebar-toggle js-sidebar-toggle">
        <i class="feather icon-align-left"></i>
    </button>



    <ol class="c-breadcrumb" style="margin-right: auto;">
        <li class="c-breadcrumb__item"><a class="c-breadcrumb__link" href="{{ route('home')}}">Home</a></li>
        <li class="c-breadcrumb__item"><a class="c-breadcrumb__link" href="#">@yield('breadcamp')</a></li>
    </ol>


    <div class="uk-navbar-right">

      
   
    {{-- User --}}
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" id="dropdownMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
            <img class="c-avatar__img" src="{{ auth()->user()->profile->avatar }}" alt="">
        </div>

        <div class="c-dropdown__menu has-arrow dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuAvatar">
            <a class="c-dropdown__item dropdown-item" href="#">{{ auth()->user()->name }}</a>
            <a class="c-dropdown__item dropdown-item" href="#">Edit Profile</a>
            <a class="c-dropdown__item dropdown-item" href="{{ route('logout')  }}">Log out</a>
        </div>
    </div>
</header>
