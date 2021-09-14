@extends('layouts.appadmin')

@section('content')

<div class="container">


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">العنوان</th>
      <th scope="col">عنوان المفتاح</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($downs as $down)
    <tr>
      <th scope="row">{{$down->id}}</th>
      <td>{{$down->title}}</td>
      <td>{{$down->titlebtn}}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.editdownlooods',['id'=>$down->id])}}">تعديل</a>
        <a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.downlooods.delete',['id'=>$down->id])}}">حذف</a>       </td>
     </td>

    </tr> 
    
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary primary-admin" href="{{route('admin.createdownlooods')}}">اضافة</a>   

</div>
  

@endsection

