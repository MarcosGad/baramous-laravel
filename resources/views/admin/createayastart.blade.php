@extends('layouts.appadmin')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.createayastart') }}" method="Post" >
                        {{csrf_field()}}

                       
                        <div class="form-group">
                        <label for="content">الأية</label>
                        <textarea class="form-control"  id="content" name="name" rows="8" cols="8"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary primary-admin">حفظ </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

