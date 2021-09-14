@extends('layouts.app')

@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="storage/img/inf1.JPG?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="storage/img/inf7.JPG?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="storage/img/inf9.JPG?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
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

<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">       
    <?php $homepages = DB::select('select * from homepages'); ?>   
    @foreach($homepages as $homepage)
    <div class="post">
      <p class="title-post">{{$homepage->title}}</p>
      <p>{!!$homepage->description!!}</p>
    </div>
    @endforeach
        </div>
    </div>
    
    <div class="android">
        <p>
          لتحميل التطبيق الخاص بموقع بيت الخلوة للأندرويد  
        </p>
        <a href="{{ URL::to('https://play.google.com/store/apps/details?id=io.Baramous.starter') }}" target="_blank">
            <img src="storage/img/GA.png">
            
            
        </a>
    </div>
</div>

@include('layouts.footer')

@endsection


