<head>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<!-- Google Fonts Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
<!-- Your custom styles (optional) -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark black">  

  @guest
  <a class="navbar-brand" href="{{ url('/') }}">
      <img src="Logo.png" height="30" alt="Wheat logo">
    </a>
  @endguest
  
  @Auth
  @if (Auth::user()->type_id == 1)
  <a class="navbar-brand" href="{{ url('/message') }}">
      <img src="Logo.png" height="30" alt="Wheat logo">
    </a>

  @elseif (Auth::user()->type_id == 2)
  <a class="navbar-brand" href="{{ url('/message') }}">
      <img src="Logo.png" height="30" alt="Wheat logo">
    </a>
  @endif
  
  @endauth    

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a  class="nav-link" href="#about">Contact Us
        </a>  
    </li>
    
      
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
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
    </ul>
  </div>
</nav>
<main class="py-4">
  @yield('content')
</main>

<!-- jQuery -->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
