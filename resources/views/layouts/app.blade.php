<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calcStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calcResponsive.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        .intro{
            background-image: url('{{ asset('images/wide.jpg') }}');
        }
    </style>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light  navcus  shadow-lg ">
            <a class="navbar-brand m-1" href="{{ route('home') }}">CHS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item  ">
                  <a class="nav-link {{ request()->is('/') ? 'active' :'' }}" href="/" ><i class="fa fa-home"></i>Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link {{ request()->is('calc') ? 'active' :'' }}" href="{{ route('calc') }}"><i class="fa fa-calculator"></i>Calculator</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('contacts') ? 'active' :'' }}{{ request()->is('search') ? 'active' :'' }}" href="{{ route('web.search') }}"><i class="fa fa-user"></i>Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('timetable') ? 'active' :'' }}" href="{{ route('timetable') }}"><i class="fa fa-table"></i>Timetable</a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">
                @guest
                            @if (Route::has('login'))
                            <div class="nav-item">
                                <a class="nav-link {{ request()->is('login') ? 'active' :'' }}" style="color: black;" href="login">login</a>
                            </div>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <div>
           @guest
               @else
               <div style="margin-left: 2.5%;">
                    <a class="btn btn-danger mt-2" href="" role="button"  v-pre>
                        Register a new Admin
                    </a>
               </div>
               
           @endguest 
        </div>
          
        <main class="py-4 home-content">
            @yield('content')
        </main>
    </div>
    <!-- FOOTER -->
    
    <!-- JavaScript -->
    <script src="{{ asset('js/calcScript.js') }}"></script>
    
</body>

</html>
