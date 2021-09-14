@extends('layouts.appadmin')

@section('content')

<div class="container">


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">التنبيه</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($alarms as $alarm)
    <tr>
      <th scope="row">{{$alarm->id}}</th>
      <td>{!!$alarm->name!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.editalarm',['id'=>$alarm->id])}}">تعديل</a>
        <a class="btn btn-danger"  onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.alarm.delete',['id'=>$alarm->id])}}">حذف</a>
         </td>
    </tr>    
    @endforeach
  </tbody>
</table>
  <a class="btn btn-primary primary-admin" href="{{route('admin.createalarm')}}">اضافة</a>   
</div>

@endsection