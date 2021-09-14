@extends('layouts.app')

@section('content')

<div class="container">
       <div class="show-mas">
          <h3>{!!$massage->title!!}</h3>
          <p>{!!$massage->massage!!}</p>
       </div>
</div>

<div style="margin-top:450px;">
@include('layouts.footer')
</div>

@endsection
