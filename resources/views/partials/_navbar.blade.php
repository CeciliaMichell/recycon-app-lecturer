@php
  $active = app()->view->getSections()['title'];
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class=" navbar-collapse w-100
    " id="navbarSupportedContent">
        @if(\Illuminate\Support\Facades\Auth::check()&&\Illuminate\Support\Facades\Auth::user()->role=='customer')
    {{-- customer  --}}
    <ul class="navbar-nav w-100 d-flex justify-content-around">
      <li class="nav-item">
        <a class="nav-link text-white {{ $active == "Home" ? "onShow" : "" }}" aria-current="page" href="/">{{ __("message.Home") }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $active == "Show Product" ? "onShow" : "" }}" aria-current="page" href="/show-product">{{ __("message.ShowProduct") }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $active == "My Cart" ? "onShow" : "" }}" aria-current="page" href="/cart">{{ __("message.MyCart") }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $active == "Transaction History" ? "onShow" : "" }}" aria-current="page" href="/transaction">{{ __("message.TransactionHistory") }}</a>
      </li>
        <form class="d-flex w-50" action="/show-product" method="get">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search" >
            <button class="btn text-white border-transparant" type="submit">{{ __("message.Search") }}</button>
        </form>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __("message.Profile") }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div class="text-primary mx-3">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>

              <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/profile">{{ __("message.EditProfile") }}</a></li>
            <li><a class="dropdown-item" href="/change-password">{{ __("message.ChangePassword") }}</a></li>
          </ul>
        </li>
        <button class="btn text-white" onclick="window.location='{{ url("/logout") }}'" type="submit">{{ __("message.Logout") }}</button>
        <x-dropdown-locale></x-dropdown-locale>
    </ul>
        @endif

    {{-- guest  --}}
            @if(!\Illuminate\Support\Facades\Auth::check())
    <ul class="navbar-nav w-100 d-flex justify-content-between">
      <div class="d-flex justify-content-between px-3">
        <li class="nav-item">
          <a class="nav-link text-white {{ $active == "Home" ? "onShow" : "" }}" aria-current="page" href="/">{{ __("message.Home") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ $active == "Show Product" ? "onShow" : "" }}" aria-current="page" href="/show-product">{{ __("message.ShowProduct") }}</a>
        </li>
      </div>
      <div class="d-flex justify-content-between">
        <li class="nav-item">
          <a class="nav-link text-white {{ $active == "Login" ? "onShow" : "" }}" aria-current="page" href="/login">{{ __("message.Login") }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ $active == "Register" ? "onShow" : "" }}" aria-current="page" href="/register">{{ __("message.Register") }}</a>
        </li>
      </li>
      <x-dropdown-locale></x-dropdown-locale>
    </div>

    </ul>
            @endif

    {{-- admin --}}
        @if(\Illuminate\Support\Facades\Auth::check()&&\Illuminate\Support\Facades\Auth::user()->role=='admin')
    <ul class="navbar-nav w-100 d-flex justify-content-around">
      <li class="nav-item">
        <a class="nav-link text-white {{ $active == "Home" ? "onShow" : "" }}" aria-current="page" href="/">{{ __("message.Home") }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white {{ $active == "Show Product" ? "onShow" : "" }}" aria-current="page" href="/show-product">{{ __("message.ShowProduct") }}</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ __("message.ManageItem") }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="/view-item">{{ __("message.ViewItem") }}</a></li>
          <li><a class="dropdown-item" href="/add-item">{{ __("message.Add Item") }}</a></li>
        </ul>
      </li>
      <form class="d-flex w-50" action="/show-product" method="get">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search" >
        <button class="btn text-white border-transparant" type="submit">{{ __("message.Search") }}</button>
      </form>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ __("message.Profile") }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="text-primary mx-3">{{strtoupper(\Illuminate\Support\Facades\Auth::user()->name)}}</div>

                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/profile">{{ __("message.EditProfile") }}</a></li>
                <li><a class="dropdown-item" href="/change-password">{{ __("message.ChangePassword") }}</a></li>
            </ul>
        </li>
        <button class="btn text-white" onclick="window.location='{{ url("/logout") }}'" type="submit">{{ __("message.Logout") }}</button>
        <x-dropdown-locale></x-dropdown-locale>
    </ul>
        @endif

    </div>
  </div>
</nav>
