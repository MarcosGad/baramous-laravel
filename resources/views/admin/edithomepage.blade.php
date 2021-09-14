@extends('layouts.appadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 50px;">
                <div class="card-header"></div>
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

                    <form action="{{route('edithomepage.update',['id'=>$homepage->id])}}" method="Post" >
                        {{csrf_field()}}

                       
                       
                        <div class="form-group row">
                            <label for="name">العنوان</label>

                            <div class="col-md-6">
                                <input id="name" type="text" value="{{$homepage->title}}" class="form-control" name="title" required >
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="content">النص</label>
                        <textarea class="form-control"  id="content" name="description" rows="8" cols="8">
                           {{$homepage->description}}
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

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

@endsection


@section('scripts')
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script>
    $(document).ready(function() {
      $('#content').summernote();
    });
</script>

@endsection
