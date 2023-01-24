<nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm">
  <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
          <div class="logo">
              Boolfolio
          </div>
          {{-- config('app.name', 'Laravel') --}}
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
              <li class="nav-item">
                  <a class="btn btn-success" href="{{url('/') }}"> <i class="fa-solid fa-circle"></i> Vai al sito</a>
              </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
              @endif
              @else

              <form action="{{ route('admin.portfolio.index') }}" method="GET">
                @csrf
                <input type="form-control d-inline-block w-50" name="text" type="text" placeholder="search">
                <button class="btn btn-close-white" type="submit"><i class="fa-solid fa-arrow-right"></i></button>
              </form>

              <li class="nav-item">
                <a class="btn btn-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                  
              </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>