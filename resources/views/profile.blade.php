@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-profile">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                          
                          <form action="{{route('profile')}}" method="POST">
                            {{ csrf_field()}}
    
                            <div class="form-group">
                              <label for="name">الأسم</label>
                              <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"  value="{{$user->name}}">
                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                             </div>
                            
                             <div class="form-group">
                                    <label for="email">البريد الألكترونى</label>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email"  value="{{$user->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                            </div>

                            <div class="form-group">
                                    <label for="phone_number"> رقم المحمول </label>
                                    <input type="text" class="form-control  @error('phone_number') is-invalid @enderror" name="phone_number"  value="{{$user->phone_number}}">
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                            </div>

                            <div class="form-group">
                                    <label for="email">تاريخ الميلاد</label>
                                    <div class="row">

                                    <div class="col-4">
                                    <span>
                                    <select name="birth_day" class="form-control" required>
                                        <?php 
                                        $start_date = 1;
                                        $end_date   = 31;
                                        for( $j=$start_date; $j<=$end_date; $j++ ) {
                                        if($j == $user->birth_day){ ?>
                                          <option value="{{$user->birth_day}}" selected>{{$user->birth_day}}</option>
                                        <?php }else{ 
                                            echo '<option value='.$j.'>'.$j.'</option>';
                                        }}
                                        ?>
                                    </select>
                                    </span>
                                    </div>
                                    
                                    <div class="col-4">
                                    <span>
                                    <select name="birth_month" class="form-control" required>
                                        <?php 
                                        $start_date = 1;
                                        $end_date   = 12;
                                        for( $j=$start_date; $j<=$end_date; $j++ ) {
                                            if($j == $user->birth_month){ ?>
                                              <option value="{{$user->birth_month}}" selected>{{$user->birth_month}}</option>
                                            <?php }else{ 
                                                echo '<option value='.$j.'>'.$j.'</option>';
                                            }}
                                        ?>
                                    </select>
                                    </span>
                                    </div>
                                    
                                    <div class="col-4">
                                    <span>
                                    <select name="birth_year" class="form-control" required>
                                        <?php 
                                        $year = date('Y');
                                        $min = $year - 60;
                                        $max = $year;
                                        for( $i=$max; $i>=$min; $i-- ) {
                                            if($i == $user->birth_year){ ?>
                                                <option value="{{$user->birth_year}}" selected>{{$user->birth_year}}</option>
                                              <?php }else{ 
                                                  echo '<option value='.$i.'>'.$i.'</option>';
                                              }}
                                          ?>
                                    </select>
                                    </span>
                                    </div>
                                    
                                    </div>
                                   
                            </div>

                            <div class="form-group">
                                    <label for="work"> الدراسة / العمل </label>
                                    <input type="text" class="form-control  @error('work') is-invalid @enderror" name="work"  value="{{$user->work}}">
                                    @error('work')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                            </div>

                            <div class="form-group">
                                    <label for="city"> المحافظة </label>
                                    <input type="text" class="form-control  @error('city') is-invalid @enderror" name="city"  value="{{$user->city}}">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                            </div>

                            <div class="form-group">
                                    <label for="church"> الكنيسة / الأبيارشية </label>
                                    <input type="text" class="form-control  @error('church') is-invalid @enderror" name="church"  value="{{$user->church}}">
                                    @error('church')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                            </div>
                            
                            <div class="form-group">
                                    <label for="father"> اب الأعتراف </label>
                                    <input type="text" class="form-control  @error('father') is-invalid @enderror" name="father"  value="{{$user->father}}">
                                    @error('father')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">كلمة السر القديمة</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                            </div>

                            <div class="form-group">
                                <label for="new_password">كلمة السر الجديدة</label>
                                <input type="text" class="form-control" name="new_password">
                                @error('new_password')
                                    <span class="invalid-feedback  @error('new_password') is-invalid @enderror" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary">تحديث</button>
                          </form>  
                         
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top:100px;">
@include('layouts.footer')
</div>

@endsection
