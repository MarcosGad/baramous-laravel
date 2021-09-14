@extends('layouts.appadmin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{ route('admin.createdownlooods') }}" method="Post" enctype="multipart/form-data">
                        {{csrf_field()}}
                       
                        <div class="form-group row">
                            <label for="title">العنوان</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required >
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="content">عنوان المفتاح	</label>

                        <div class="col-md-6">
                                <input id="titlebtn" type="text" class="form-control @error('titlebtn') is-invalid @enderror" name="titlebtn" required >
                                @error('titlebtn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                        <label for="filename">الملف</label>

                        <div class="col-md-6">
                                <input id="filename" type="file" class="form-control-file" name="filename" required>
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


