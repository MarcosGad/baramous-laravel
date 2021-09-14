@extends('layouts.app')

@section('content')

<div class="container">
        @if($viewhagz->count()>0)
        <table class="table table-viewhagz">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col" class="d-none d-md-block">الكنيسة</th>
            <th scope="col">أب الإعتراف</th>
            <th scope="col">تاريخ الحجز</th>
            <th scope="col">عدد الأفراد</th>
            <th scope="col">ملاحظات</th>
            <th scope="col">حالة الطلب</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($viewhagz as $hagz)
            <tr>
            <td scope="row">

            </td>
            <td scope="row" class="d-none d-md-block">{{$hagz->church}}</td>
            <td scope="row">{{$hagz->father}}</td>
            <td scope="row">{{$hagz->date_of_hagz}}</td>
            <td scope="row">{{$hagz->per_number}}</td>
            <td scope="row">{{$hagz->note}}</td>
            <td scope="row">{!!$hagz->state!!}</td>
            <td scope="row"><a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('viewhagz.notshow',['id' => $hagz->id])}}" ><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
            @else
                <p class="text-center p-not-hagz">لا يوجد حجوزات الأن</p>
            @endif
        </tbody>
        </table>
</div>

<div style="margin-top:585px;">
@include('layouts.footer')
</div>

@endsection
