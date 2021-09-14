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
      <th scope="col">تاريخ الخلوة</th>
      <th scope="col">عددالأفراد</th>
      <th scope="col">ملاحظات</th>
      <th scope="col">الحالة</th>
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
      <td>
        <a class="btn btn-success" href="{{route('admin.editstate',['id'=>$hagz->id])}}">موافقة</a> 
        <a class="btn btn-danger" href="{{route('admin.editstatetwo',['id'=>$hagz->id])}}">رفض</a> </td>
    </tr>
    @endforeach
  </tbody>
</table>
  {{ $hagzs->links() }}
@endsection
