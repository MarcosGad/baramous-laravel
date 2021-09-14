@extends('layouts.appadmin')

@section('content')

<div class="container">


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الأية</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($ayastarts as $ayastart)
    <tr>
      <th scope="row">{{$ayastart->id}}</th>
      <td>{!!$ayastart->name!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.editayastart',['id'=>$ayastart->id])}}">تعديل</a>
        <a class="btn btn-danger"  onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.ayastart.delete',['id'=>$ayastart->id])}}">حذف</a>
         </td>
    </tr>    
    @endforeach
  </tbody>
</table>
<a class="btn btn-primary primary-admin" href="{{route('admin.createayastart')}}">اضافة</a>  
</div>

@endsection

