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
  @foreach($tablehgzs as $tablehgz)
    <tr>
      <th scope="row">{{$tablehgz->id}}</th>
      <td>{{$tablehgz->title}}</td>
      <td>{!!$tablehgz->table!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.edittablehgz',['id'=>$tablehgz->id])}}">تعديل</a>
        <a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.tablehgz.delete',['id'=>$tablehgz->id])}}">حذف</a>       </td>
     </td>

    </tr> 
    
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary primary-admin" href="{{route('admin.createtablehgz')}}">اضافة</a>   

</div>
  

@endsection

