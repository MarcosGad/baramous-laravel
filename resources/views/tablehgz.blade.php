@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">        
    @foreach($tablehgzs as $tablehgz)
    <div class="post">
      <p class="title-post">{{$tablehgz->title}}</p>
      <p>{!!$tablehgz->table!!}</p>
    </div>
    @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection
