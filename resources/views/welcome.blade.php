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
    <script src="{{ asset('js/newpage.js') }}" defer></script>
  

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
                <span>دير السيدة العذراء برموس</span>
        </div>
</div>

@include('uppertwo')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/storage/img/1.jpg?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
 
</div>

<div class="welcome-btn">
 <span>
 <a  class="btn btn-primary" href="{{ route('index') }}">بيت الخلوة</a>
 <span>
 <span>
 <a class="btn btn-primary" href="{{ URL::to('https://www.baramous.com/baramoskahana/index.php') }}">بيت الكهنة</a>
 </span>
</div>

<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">       
    <?php $pagestarts = DB::select('select * from pagestarts'); ?>   
    @foreach($pagestarts as $pagestart)
    <div class="post">
      <p class="title-post">{{$pagestart->title}}</p>
      <p>{!!$pagestart->description!!}</p>
    </div>
    @endforeach
        </div>
    </div>
</div>


@include('layouts.footer')


</body>
</html>







