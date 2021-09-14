@extends('layouts.appadmin')

@section('content')

<div class="container">


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">النص</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($hsystems as $hsystem)
    <tr>
      <th scope="row">{{$hsystem->id}}</th>
      <td>{!!$hsystem->name!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.edithsystem',['id'=>$hsystem->id])}}">تعديل</a>
        <a class="btn btn-danger"  onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.hsystem.delete',['id'=>$hsystem->id])}}">حذف</a>
      </td>
    </tr>    
    @endforeach
  </tbody>
</table>
  <a class="btn btn-primary primary-admin" href="{{route('admin.createhsystem')}}">اضافة</a>  
</div>

@endsection

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

@endsection


@section('scripts')
 
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script>
    $(document).ready(function() {
      $('#content').summernote();
    });
</script>

@endsection
