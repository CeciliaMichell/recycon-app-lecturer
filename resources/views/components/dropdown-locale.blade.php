<div class="dropdown">
  <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    {{ strtoupper(session('locale') ?? config('app.locale')) }}
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{ url('switch/en') }}">EN</a></li>
    <li><a class="dropdown-item" href="{{ url('switch/id') }}">ID</a></li>
  </ul>
</div>