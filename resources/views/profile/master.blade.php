<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      @if (Auth::check())
                        <li><a href="{{ url('/findFriends')}}"><i class="fas fa-search"></i>TemukanTeman </a></li>

                        <li><a href="{{ url('/requests')}}"><i class="fa fa-plus" aria-hidden="true"></i>PermintaanTeman(
                          {{App\friendships::where('status',Null)->where('user_requested', Auth::user()->id)->count()}}
                        )</a></li>


                       <!-- <li></li> -->
                      @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else





                      <li>
                        <a href="{{url('/friends')}}">  <i class="fa fa-users fa-3x" aria-hidden="true"></i></a>
                      </li>

                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle fa fa-globe" href="#"
                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pr>
                          <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
                          <span class="badge"
                            style="background:red; position:relative; top:-16px; left:-10px;">

                          {{  App\notifcations::where('status',1)
                            ->where('user_hero', Auth::user()->id)
                            ->count() }}

                          </span>

                      </a>

                      <?php
                      $notes = DB::table('users')
                      ->leftJoin('notifcations', 'users.id', 'notifcations.user_logged')
                      ->where('user_hero', Auth::user()->id)
                      //->where('status', 1) // unread noti
                      ->orderBy('notifcations.created_at', 'desc')
                      ->get();
                       ?>


                      <ul class="dropdown-menu" role="menu">
                        @foreach($notes as $note)
                        <a href="{{url('/notifications')}}/{{$note->id}}">
                            @if($note->status==1)
                                <li style="background:#E4E9F2; padding:10px">
                            @else
                                <li style="padding:10px">  
                            @endif
                          <div class="row">
                        <div class="col-md-2">
                          <img src="{{url('../')}}/public/img/{{$note->pic}}"
                          style="width:50px; margin:5px; padding:5px; backgroud:#fff" class="img-rounded">
                        </div>
                        <div class="col-md-10 ">

                          <b style="color:green; font-size:90%">  {{ucwords($note->name)}}</b>
                          <span style="color:#000; font-size:90%"> menerima {{$note->note}} </span>
                        </br>
                          <small style="color:#98949C"> <i aria-hidden="true" class="fa fa-users"></i>
                              {{date('F j, Y', strtotime($note->created_at))}} at {{date('H: i', strtotime($note->created_at))}}</small>
                          </div>
                        </div>
                        </li></a>
                        @endforeach
                      </ul>
                      </li>

                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="30px" height="30px" class="img-circle"/> <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('/profile')}}/{{Auth::user()->slug}}">
                                {{ __('Profile') }}
                            </a>


                              <a class="dropdown-item" href="{{url('editProfile')}}">
                                  {{ __('Edit Profile') }}
                              </a>

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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
