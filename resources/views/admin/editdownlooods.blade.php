@extends('layouts.appadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 50px;">
                <div class="card-body">

                        @if(count($errors)>0)
                        <ul class="navbar-nav mr-auto">
                        @foreach ($errors->all() as $error)
                        <li class="nav-item active">
                           {{$error}}
                        </li>
                        @endforeach
                        </ul>
                        @endif

                    <form action="{{route('editdownlooods.update',['id'=>$down->id])}}" method="Post" enctype="multipart/form-data">
                        {{csrf_field()}}

                       
                       
                        <div class="form-group row">
                            <label for="title">العنوان</label>
                            <div class="col-md-6">
                                <input id="title" type="text" value="{{$down->title}}" class="form-control" name="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="titlebtn">عنوان المفتاح	</label>
                            <div class="col-md-6">
                                <input id="titlebtn" type="text" value="{{$down->titlebtn}}" class="form-control" name="titlebtn">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="filename">الملف</label>
                            <div class="col-md-6">
                                <input id="filename" type="file" class="form-control-file" name="filename">
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary primary-admin">حفظ </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


