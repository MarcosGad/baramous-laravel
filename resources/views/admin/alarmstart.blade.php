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
  @foreach($alarmstarts as $alarmstart)
    <tr>
      <th scope="row">{{$alarmstart->id}}</th>
      <td>{!!$alarmstart->name!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.editalarmstart',['id'=>$alarmstart->id])}}">تعديل</a>
        <a class="btn btn-danger"  onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.alarmstart.delete',['id'=>$alarmstart->id])}}">حذف</a>
         </td>
    </tr>    
    @endforeach
  </tbody>
</table>
  <a class="btn btn-primary primary-admin" href="{{route('admin.createalarmstart')}}">اضافة</a>   
</div>

@endsection