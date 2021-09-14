@extends('layouts.appadmin')

@section('content')

<div class="container">
  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.createhsystem') }}" method="Post" >
                        {{csrf_field()}}
                       
                        <div class="form-group">
                        <label for="content">النص</label>
                        <textarea class="form-control"  id="content" name="name" rows="8" cols="8"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success primary-admin">حفظ</button>
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
