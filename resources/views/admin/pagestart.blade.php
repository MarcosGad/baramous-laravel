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
  @foreach($pagestarts as $pagestart)
    <tr>
      <th scope="row">{{$pagestart->id}}</th>
      <td>{{$pagestart->title}}</td>
      <td>{!!$pagestart->description!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.editpagestart',['id'=>$pagestart->id])}}">تعديل</a>
        <a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.pagestart.delete',['id'=>$pagestart->id])}}">حذف</a>       </td>
     </td>

    </tr> 
    
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary primary-admin" href="{{route('admin.createpagestart')}}">اضافة</a>   

</div>
  

@endsection

