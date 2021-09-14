@extends('layouts.appadmin')

@section('content')
  
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الإسم</th>
      <th scope="col">البريد الإلكترونى</th>
      <th scope="col">رقم المحمول</th>
      <th scope="col">تاريخ الميلاد</th>
      <th scope="col">الدراسة/العمل</th>
      <th scope="col">المحافظة</th>
      <th scope="col">الكنيسة/الإيبارشية</th>
      <th scope="col">أب الإعتراف</th>
      <th scope="col">الرسالة</th>
      <th scope="col"> حذف الرسالة</th>
    </tr>
  </thead>
  <tbody>
  @foreach($notes as $note)
    <tr>
      <th scope="row">{{$note->id}}</th>
      <td>{{$note->name}}</td>
      <td>{{$note->email}}</td>
      <td>{{$note->phone_number}}</td>
      <td>{{$note->birth_day}} / {{$note->birth_month}} / {{$note->birth_year}}</td>
      <td>{{$note->work}}</td>
      <td>{{$note->city}}</td>
      <td>{{$note->church}}</td>
      <td>{{$note->father}}</td>
      <td>{{$note->massage}}</td>
      <td>
      <a class="btn btn-success" href="{{route('admin.createmassage',['email'=>$note->email])}}">أرسال رسالة</a>
      <a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.note.delete',['id'=>$note->id])}}">حذف</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
