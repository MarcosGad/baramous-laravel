@extends('layouts.appadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 50px;">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{route('editstatetwo.updateTwo',['id'=>$states->id])}}">
                        @csrf


                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">الحالة</label>

                            <div class="col-md-6">
                            <textarea class="form-control" id="content" name="state" rows="4" cols="4">نعتذر عن عدم امكانية الخلوة فى هذه الفترة</textarea>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary primary-admin">
                                ارسال  
                                </button>
                            </div>
                        </div>
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


                     