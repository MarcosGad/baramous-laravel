@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-register">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">الاسم</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">البريد الألكترونى</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">رقم المحمول</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">تاريخ الميلاد</label>
   
                            <div class="col-md-6">
                            <div class="row">

                               <div class="col-4">
                                <span>
                                <select name="birth_day" class="form-control @error('birth_day') is-invalid @enderror" required>
                                    <option>يوم</option>
                                    <?php 
                                    $start_date = 1;
                                    $end_date   = 31;
                                    for( $j=$start_date; $j<=$end_date; $j++ ) {
                                        echo '<option value='.$j.'>'.$j.'</option>';
                                    }
                                    ?>
                                </select>
                                @error('birth_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                                </div>
                                
                                <div class="col-4">
                                <span>
                                <select name="birth_month" class="form-control @error('birth_month') is-invalid @enderror" required>
                                    <option>شهر</option>
                                    <?php 
                                    $start_date = 1;
                                    $end_date   = 12;
                                    for( $j=$start_date; $j<=$end_date; $j++ ) {
                                        echo '<option value='.$j.'>'.$j.'</option>';
                                    }
                                    ?>
                                </select>
                                @error('birth_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                                </div>
                                
                                <div class="col-4">
                                <span>
                                <select name="birth_year" class="form-control @error('birth_year') is-invalid @enderror" required>
                                    <option>سنة</option>
                                    <?php 
                                    $year = date('Y');
                                    $min = $year - 60;
                                    $max = $year;
                                    for( $i=$max; $i>=$min; $i-- ) {
                                        echo '<option value='.$i.'>'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                                @error('birth_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                                </div>
                                
                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="work" class="col-md-4 col-form-label text-md-right">الدراسة / العمل</label>

                            <div class="col-md-6">
                                <input id="work" type="text" class="form-control @error('work') is-invalid @enderror" name="work" required>

                                @error('work')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">المحافظة</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="church" class="col-md-4 col-form-label text-md-right">الكنيسة / الأيبارشية</label>

                            <div class="col-md-6">
                                <input id="church"  type="text" class="form-control @error('church') is-invalid @enderror" name="church" required>

                                @error('church')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="father" class="col-md-4 col-form-label text-md-right">اب الأعتراف</label>

                            <div class="col-md-6">
                                <input id="father" type="text" class="form-control @error('father') is-invalid @enderror" name="father" required>

                                @error('father')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة السر</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password') 
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تأكيد كلمة السر</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل
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

