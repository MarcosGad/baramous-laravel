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
  @foreach($homepages as $homepage)
    <tr>
      <th scope="row">{{$homepage->id}}</th>
      <td>{{$homepage->title}}</td>
      <td>{!!$homepage->description!!}</td>
      <td>
        <a class="btn btn-success" href="{{route('admin.edithomepage',['id'=>$homepage->id])}}">تعديل</a>
        <a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('admin.homepage.delete',['id'=>$homepage->id])}}">حذف</a>       </td>
     </td>

    </tr> 
    
    @endforeach
  </tbody>
</table>

<a class="btn btn-primary primary-admin" href="{{route('admin.createhomepage')}}">اضافة</a>   

</div>
  

@endsection

