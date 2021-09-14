<?php 
$daysOne="";
$daysTwo="";
$daysThree="";
$daysFour="";
$daysFive="";

$daysSix="";
$daysSeven="";

$daysFromOne="";
$daysToOne="";
$daysFromTwo="";
$daysToTwo="";
$daysFromThree="";
$daysToThree="";
$daysFromFour="";
$daysToFour="";
$daysFromFive="";
$daysToFive="";

$daysFromSix="";
$daysToSix="";

$daysFromSeven="";
$daysToSeven="";
    foreach ($day_ofs as $day_of) {
                  $daysOne = $day_of->day_of_one;
                  $daysTwo = $day_of->day_of_two;
                  $daysThree = $day_of->day_of_three;
                  $daysFour = $day_of->day_of_four;
                  $daysFive = $day_of->day_of_five;

                  $daysSix = $day_of->day_of_six;
                  $daysSeven = $day_of->day_of_seven;

                  $daysFromOne = $day_of->day_of_from_one;
                  $daysToOne = $day_of->day_of_to_one;

                  $daysFromTwo = $day_of->day_of_from_two;
                  $daysToTwo = $day_of->day_of_to_two;

                  $daysFromThree = $day_of->day_of_from_three;
                  $daysToThree = $day_of->day_of_to_three;

                  $daysFromFour = $day_of->day_of_from_four;
                  $daysToFour = $day_of->day_of_to_four;

                  $daysFromFive = $day_of->day_of_from_five;
                  $daysToFive = $day_of->day_of_to_five;

                  $daysFromSix = $day_of->day_of_from_six;
                  $daysToSix = $day_of->day_of_to_six;

                  $daysFromSeven = $day_of->day_of_from_seven;
                  $daysToSeven = $day_of->day_of_to_seven;
                  
              }    
?>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="{{ asset('js/flatpickr.min.js') }}" defer></script>

    <script>
      var appT = <?php echo json_encode($daysOne); ?>;
      var appTT = <?php echo json_encode($daysTwo); ?>;
      var appTTT = <?php echo json_encode($daysThree); ?>;
      var appR = <?php echo json_encode($daysFour); ?>;
      var appRR = <?php echo json_encode($daysFive); ?>;

      var appL = <?php echo json_encode($daysSix); ?>;
      var appLL = <?php echo json_encode($daysSeven); ?>;

      var appTTTT = <?php echo json_encode($daysFromOne); ?>;
      var appTTTTT = <?php echo json_encode($daysToOne); ?>;

      var appTTTTTT = <?php echo json_encode($daysFromTwo); ?>;
      var appTTTTTTT = <?php echo json_encode($daysToTwo); ?>;

      var appTTTTTTTT = <?php echo json_encode($daysFromThree); ?>;
      var appTTTTTTTTT = <?php echo json_encode($daysToThree); ?>;

      var appRRR = <?php echo json_encode($daysFromFour); ?>;
      var appRRRR = <?php echo json_encode($daysToFour); ?>;

      var appRRRRR = <?php echo json_encode($daysFromFive); ?>;
      var appRRRRRR = <?php echo json_encode($daysToFive); ?>;

      var appLLL = <?php echo json_encode($daysFromSix); ?>;
      var appLLLL = <?php echo json_encode($daysToSix); ?>;

      var appLLLLL = <?php echo json_encode($daysFromSeven); ?>;
      var appLLLLLL = <?php echo json_encode($daysToSeven); ?>;
      


      var appOne = JSON.stringify(appT);
      var appTwo = JSON.stringify(appTT);
      var appThree = JSON.stringify(appTTT);
      var appFour = JSON.stringify(appR);
      var appFive = JSON.stringify(appRR);
      var appSix = JSON.stringify(appL);
      var appSeven = JSON.stringify(appLL);


      var appFromOne = JSON.stringify(appTTTT);
      var appToOne = JSON.stringify(appTTTTT);

      var appFromTwo = JSON.stringify(appTTTTTT);
      var appToTwo = JSON.stringify(appTTTTTTT);

      var appFromThree = JSON.stringify(appTTTTTTTT);
      var appToThree = JSON.stringify(appTTTTTTTTT);

      var appFromFour = JSON.stringify(appRRR);
      var appToFour = JSON.stringify(appRRRR);

      var appFromFive = JSON.stringify(appRRRRR);
      var appToFive = JSON.stringify(appRRRRRR);

      var appFromSix = JSON.stringify(appLLL);
      var appToSix = JSON.stringify(appLLLL);

      var appFromSeven = JSON.stringify(appLLLLL);
      var appToSeven = JSON.stringify(appLLLLLL);

      
        $(document).ready(function() {
            $(".flatpickrtwo").flatpickr({
                minDate: "today",
                disable: [{
                    from:appFromOne,
                    to:appToOne
                },
                {
                    from:appFromTwo,
                    to:appToTwo
                },
                {
                    from:appFromThree,
                    to:appToThree
                },
                {
                    from:appFromFour,
                    to:appToFour
                },
                {
                    from:appFromFive,
                    to:appToFive
                },
                {
                    from:appFromSix,
                    to:appToSix
                },
                {
                    from:appFromSeven,
                    to:appToSeven
                },
                appOne,appTwo,appThree,appFour,appFive,appSix,appSeven]
            }); 
        });
</script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-hagz">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('hagz') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">الإسم</label>

                            <div class="col-md-6">
                                <input id="name" value="{{$name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  readonly autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">البريد الإلكترونى</label>

                            <div class="col-md-6">
                                <input id="email" value="{{$email}}"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" readonly>

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
                                <input id="phone_number" value="{{$phone_number}}"  type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" readonly>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">تاريح الميلاد</label>

                            <div class="col-md-6">
                               <div class="row">
                                 <div class="col-4">
                                   <input type="number" value="{{$birth_day}}" class="form-control" name="birth_day" readonly >
                                 </div>
                                 <div class="col-4">
                                    <input type="number" value="{{$birth_month}}" class="form-control" name="birth_month" readonly >
                                 </div>
                                 <div class="col-4">
                                    <input type="number" value="{{$birth_year}}" class="form-control" name="birth_year" readonly >
                                 </div>
                               </div>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="work" class="col-md-4 col-form-label text-md-right">الدراسة / العمل</label>

                            <div class="col-md-6">
                                <input id="work" type="text" value="{{$work}}" class="form-control @error('work') is-invalid @enderror" name="work" readonly>

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
                                <input id="city" type="text" value="{{$city}}" class="form-control @error('city') is-invalid @enderror" name="city" readonly>

                                @error('work')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="church" class="col-md-4 col-form-label text-md-right">الكنيسة / الإيبارشية</label>

                            <div class="col-md-6">
                                <input id="church" value="{{$church}}" type="text" class="form-control @error('church') is-invalid @enderror" name="church" readonly>

                                @error('church')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="father" class="col-md-4 col-form-label text-md-right">أب الإعتراف</label>

                            <div class="col-md-6">
                                <input id="father" type="text"  value="{{$father}}"  class="form-control @error('father') is-invalid @enderror" name="father" readonly>

                                @error('father')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_hagz" class="col-md-4 col-form-label text-md-right">تاريخ الخلوة</label>

                            <div class="col-md-6">
                                <input id="date_of_hagz" class="flatpickrtwo form-control @error('date_of_hagz') is-invalid @enderror" name="date_of_hagz" type="text" readonly required>
                                @error('date_of_hagz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="per_number" class="col-md-4 col-form-label text-md-right">عدد الأفراد</label>

                            <div class="col-md-6">
                                <input id="per_number" value ="1" min="1" max="3" type="number" class="form-control @error('per_number') is-invalid @enderror" name="per_number" reuired>

                                @error('per_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="note" class="col-md-4 col-form-label text-md-right">ملاحظات</label>

                            <div class="col-md-6">
                            <textarea class="form-control @error('note') is-invalid @enderror" name="note" id="note" rows="5"></textarea>
                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input style="display: none;" value="تم الحجز من فضلك انتظر الرد سواء بالموافقة أو الرفض" name="state">


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


                     