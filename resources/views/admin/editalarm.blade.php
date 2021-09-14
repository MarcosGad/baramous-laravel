@extends('layouts.appadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">التنبيهات</div>
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

                    <form action="{{route('editalarm.update',['id'=>$alarm->id])}}" method="Post" >
                        {{csrf_field()}}

                       
                        <div class="form-group">
                        <label for="content">التنبيه</label>
                        <textarea class="form-control"  id="content" name="name" rows="8" cols="8">
                        {{$alarm->name}}
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


