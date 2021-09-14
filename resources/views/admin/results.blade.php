@extends('layouts.appadmin')

@section('content')


<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <form  method="GET" action="/results" class="form-inline">
     {{ csrf_field()}}
    <input class="form-control mr-2" value="{{$query}}" name="search" type="search" aria-label="Search">
    <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
  </form>
</nav>

@if ($users->count() > 0)

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">البريد الألكترونى</th>
      <th scope="col">رقم المحمول</th>
      <th scope="col">تاريخ الميلاد</th>
      <th scope="col">الدراسة/العمل</th>
      <th scope="col">المحافظة</th>
      <th scope="col">الكنيسة/الأيبارشية</th>
      <th scope="col">اب الاعتراف</th>
      <th scope="col"> تاريخ التسجيل</th>
      <th scope="col"> حذف المستخدم</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone_number}}</td>
      <td>{{$user->birth_day}} / {{$user->birth_month}} / {{$user->birth_year}}</td>
      <td>{{$user->work}}</td>
      <td>{{$user->city}}</td>
      <td>{{$user->church}}</td>
      <td>{{$user->father}}</td>
      <td>{{$user->created_at}}</td>
      <td>
        <a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.users.delete',['id'=>$user->id])}}">حذف</a>       </td>
    </tr>
    @endforeach
  </tbody>
</table>

	@else
	
	<p class="reaults">لا يوجد مستخدم بهذا الأسم</p>
	
	@endif

@endsection
