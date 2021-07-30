<li class="nav-item">
    <a class="nav-link {{ (Route::current()->uri == $route)?'active':'' }}" aria-current="page" href="{{ route($route) }}">
      <span data-feather="{{ $icon }}"></span>
      {{ $label }}
    </a>
  </li>