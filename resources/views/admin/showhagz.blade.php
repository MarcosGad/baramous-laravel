@extends('layouts.appadmin')

@section('content')
  
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
      <th scope="col">تاريخ الخلوة</th>
      <th scope="col">عددالافراد</th>
      <th scope="col">ملاحظات</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($hagzs as $index=>$hagz)
    <tr>
      <th scope="row">{{ $index + 1 }}</th>
      <td>{{$hagz->name}}</td>
      <td>{{$hagz->email}}</td>
      <td>{{$hagz->phone_number}}</td>
      <td>{{$hagz->birth_day}} / {{$hagz->birth_month}} / {{$hagz->birth_year}}</td>
      <td>{{$hagz->work}}</td>
      <td>{{$hagz->city}}</td>
      <td>{{$hagz->church}}</td>
      <td>{{$hagz->father}}</td>
      <td>{{$hagz->date_of_hagz}}</td>
      <td>{{$hagz->per_number}}</td>
      <td>{{$hagz->note}}</td>
      <td scope="row"><a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.showhagz.notshowadmin',['id' => $hagz->id])}}" ><i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<p class="number-calc">
  المجموع = <span>{{$per_number}}</span>
    {{ $hagzs->links() }}
</p>
@endsection
