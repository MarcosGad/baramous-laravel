@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">        
        @foreach($hsystems as $hsystem)
            <p class="p-hsystem">{!!$hsystem->name!!}</p>
        @endforeach
        </div>
        <div class="col-12 d-none d-md-block">        
          <div class="row">
              <div class="col-sm-6 col-lg-3">
                <img class="img-hsystem" src="storage/img/inf5.JPG">
              </div>
              <div class="col-sm-6 col-lg-3">
              <img class="img-hsystem"  src="storage/img/inf12.JPG">
              </div>
              <div class="col-sm-6 col-lg-3">
              <img class="img-hsystem"  src="storage/img/inf6.JPG">
              </div>
              <div class="col-sm-6 col-lg-3">
              <img class="img-hsystem"  src="storage/img/inf8.JPG">
              </div>
          </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection
