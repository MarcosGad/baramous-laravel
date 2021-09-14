@extends('layouts.appadmin')

@section('content')

<div class="container">


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">العنوان</th>
      <th scope="col">النص</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{!!$post->description!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.editpost',['id'=>$post->id])}}">تعديل</a>
        <a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.post.delete',['id'=>$post->id])}}">حذف</a>       </td>
     </td>

    </tr> 
    
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary primary-admin" href="{{route('admin.createpost')}}">اضافة</a>   

</div>
  

@endsection

