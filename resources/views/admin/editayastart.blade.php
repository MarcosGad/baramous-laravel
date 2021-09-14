@extends('layouts.appadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">الأيات</div>
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

                    <form action="{{route('editayastart.update',['id'=>$ayastart->id])}}" method="Post" >
                        {{csrf_field()}}

                       
                        <div class="form-group">
                        <label for="content">الأية</label>
                        <textarea class="form-control"  id="content" name="name" rows="8" cols="8">
                        {{$ayastart->name}}
                        </textarea>
                        </div>


                        <button type="submit" class="btn btn-primary primary-admin">حفظ </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

