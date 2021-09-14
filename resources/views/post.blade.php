@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">        
    @foreach($posts as $post)
    <div class="post">
      <p class="title-post">{{$post->title}}</p>
      <p>{!!$post->description!!}</p>
    </div>
    @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection
