<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/main.js') }}" defer></script> --}}
    <script src="/js/main.js" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    
     {{-- jquery --}}
     

 {{-- handlebar --}}
 {{-- <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script> --}}
 <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
{{-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                       
                    </ul>
     
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown d-flex me-4">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="rounded-circle border d-flex justify-content-center align-items-center"
                                style="width:70px;height:70px"
                             alt="Avatar">
                           {{-- <i class="fas fa-user-alt fa-3x text-info"></i> --}}
                           @if(Auth::user()->image)
                           <img src="{{ asset('storage/image/'.Auth::user()->image)}}" alt="error" style="object-fit: cover;width:100%;height:100%;border-radius:100%" />
                           @endif
                           </div>
                                <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

  
   
</body>
</html>
<script id="demo_handlebar" type="text/x-handlebars-template">
    <div class="comment_items d-flex">
        <div class="rounded-circle border d-flex justify-content-center align-items-center" style="width:70px;height:70px" alt="Avatar">
            <img src="http://127.0.0.1:8000/storage/image/@{{ImageUser}}" alt="error" style="object-fit: cover;width:100%;height:100%;border-radius:100%">
        </div>
        <div  style="display: flex;
                                                margin-left: 10px;
                                                flex-direction: column;
                                                width: 100%;">
            <div style="font-weight: bold">
                @{{Username}}
            </div>
            <div class="comment_text">
                <p id="comment_des">@{{textComment}}</p>
            </div>
            <input style="display: none" data-image=@{{ImageUser}}
            data-idcomment=@{{comment_id}} data-postid=@{{post_id}} data-userid=@{{user_id}}  
            class="form-control" value=@{{textComment}} id="editComment" class="editComment" type="text" 
            name="text" placeholder="Comment...">
            <div class="time_comment">
                <p id="time_comment">@{{date}}</p>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn p-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-more-horizontal icon-lg pb-3px">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg>
            </button>
          
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             <li><a class="dropdown-item" data-id=@{{comment_id}} id="delete-comment" >Delete Comment</a></li>
             <li class="edit" id="edit"><a class="dropdown-item" >Edit comment</a></li>  
            
            </ul>
          </div>
    </div>
</script>
<script id="comment_edit" type="text/x-handlebars-template">
                <p id="comment_des">@{{content}}</p>
</script>
<script id="time_comment_handlebar" type="text/x-handlebars-template">
    <p id="time_comment">just now</p>
</script>
<script id="edit_post" type="text/x-handlebars-template">
    @{{text}}
</script>
