<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>baramous</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/Capp.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Cstyle.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('/storage/img/favicon.png') }}">
</head>
<body>
    <div id="app">

    <div class="container">
        <div class="upper-top animated pulse">
                <span>دير سيدة البرموس</span> - 
                <span>بيت الخلوة</span>
        </div>
    </div>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        @if (Auth::user())
                        <li class="nav-item {{ Request::segment(1) === 'home' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('home') }}">الرئيسية</a>
                        </li>
                        @else
                        <li class="nav-item {{ Request::segment(1) === 'index' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('index') }}">الرئيسية</a>
                        </li>
                        @endif


                        <li class="nav-item {{ Request::segment(1) === 'hsystem' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('hsystem') }}">نظام بيت الخلوة</a>
                        </li>
                         
                        <li class="nav-item {{ Request::segment(1) === 'tablehgz' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('tablehgz') }}">جدول بيت الخلوة</a>
                        </li>

                        <li class="nav-item {{ Request::segment(1) === 'post' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('post') }}">قراءات روحية</a>
                        </li>

                        <li class="nav-item {{ Request::segment(1) === 'downlooods' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('downlooods') }}">التحميلات</a>
                        </li>
                        
                        <li class="nav-item {{ Request::segment(1) === 'hagz' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('hagz') }}">الحجز</a>
                        </li>
                        
                        @if (Auth::user())
                        <li class="nav-item {{ Request::segment(1) === 'viewhagz' ? 'active' : null }}">
                        <a class="nav-link date-mas" href="{{ route('viewhagz') }}">
                        <?php
                            $user_id = Auth::user()->id;
                            $massages = DB::select("select COUNT(id) AS massage_T from hagzs where user_id =" . $user_id . "&& show_user = 0");  ?>
                                حجوزاتى
                            @foreach($massages as $massage)
                                <span class="massage-number"> {{$massage->massage_T}}  </span> 
                            @endforeach
                        </a> 
                        </li>
                        
                        <li class="nav-item {{ Request::segment(1) === 'massages' ? 'active' : null }}">
                        <a class="nav-link date-mas" href="{{ route('massages') }}">
                                     <?php
                                        $user_id = Auth::user()->id;
                                        $massages = DB::select("select COUNT(id) AS massage_T from massages where user_id =" . $user_id . "&& massage_state = 0
                                        || user_id IS NULL && massage_state = 0");  ?>
                                        البريد
                                        @foreach($massages as $massage)
                                               <span class="massage-number"> {{$massage->massage_T}}  </span> 
                                        @endforeach
                                         
                        </a>
                        </li>
                        <li class="nav-item {{ Request::segment(1) === 'note' ? 'active' : null }}">
                            <a class="nav-link" href="{{ route('note') }}">أتصل بنا</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item {{ Request::segment(1) === 'login' ? 'active' : null }}">
                                <a class="nav-link " href="{{ route('login') }}">تسجيل الدخول</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{ Request::segment(1) === 'register' ? 'active' : null }}">
                                    <a class="nav-link" href="{{ route('register') }}">التسجيل</a>
                                </li>
                            @endif
                        @else
                            <li class="navbar-nav ml-auto">
                               

                            <li class="nav-item {{ Request::segment(1) === 'profile' ? 'active' : null }}">        
                                <a class="nav-link" href="{{ route('profile') }}">
                                    تعديل البيانات
                                </a>
                            </li>   

                            <li class="nav-item {{ Request::segment(1) === 'logout' ? 'active' : null }}">    
                                   
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                                    </a>
                            </li>
                         
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

        @include('upper')

        <main>
            @yield('content')
        </main>
    </div>

</body>
</html>
