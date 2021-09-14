@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">        
    @foreach($downs as $down)
    <div class="post">
      <h4 class="title-down">{{$down->title}}</h4>
      <div class="text-center">
      <a class="link-down btn-lg title-down bounce-out-on-hover" href="{{$down->filename}}">{{$down->titlebtn}}</a>
      </div>
    </div>
    @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection
