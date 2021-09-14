@extends('layouts.app')
@section('content')

<div class="container">
        @if($massages->count()>0)
        <table class="table table-bordered">
        <tbody>
        @foreach($massages as $massage)
            <tr>
            <td scope="row" width="80%"><a class="mas-link" href="{{route('showmassages',['id'=>$massage->id])}}"><i class="fas fa-envelope"></i> {!!$massage->title!!}</a></td>
            <td scope="row" width="15%" class="date-mas">{{$massage->created_at}}</td>
            <td scope="row" width="5%"><a class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحذف?')" href="{{route('massages.delete',['id'=>$massage->id])}}"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach
            @else
                <p class="text-center p-not-hagz">لا يوجد رسائل الأن</p>
            @endif
        </tbody>
        </table>

<div>
  <i class="heart fa fa-heart-o"></i>
</div>

</div>

<div style="margin-top:450px;">
@include('layouts.footer')
</div>

@endsection
