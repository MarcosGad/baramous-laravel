@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-note">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('note') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="massage" class="col-md-4 col-form-label text-md-right">رسالتك</label>

                            <div class="col-md-6">
                            <textarea class="form-control @error('massage') is-invalid @enderror" name="massage" id="massage" rows="8"></textarea>
                                @error('massage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    أرسال
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection


                     