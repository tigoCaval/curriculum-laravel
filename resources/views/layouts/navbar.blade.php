<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
</head>
<body class="bg-white">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">RH <span class="sr-only">(current)</span></a>
            </li>
            
            @if (Route::has('login'))
               @auth
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/home') }}">Admin</a>
                </li>   
               @else
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                

                    <a class="dropdown-item" href="{{ route('login') }}">Entrar</a>
                    @if (Route::has('register'))
                    <a class="dropdown-item" href="{{ route('register') }}">Registrar</a>
                    @endif 

                    
                
                </div>
                </li>
                @endauth 
            @endif
          </ul>
         
        </div>
      </nav>
      <main class="py-4">
            @yield('content')
      </main>
</body>
</html>