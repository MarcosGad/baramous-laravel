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
    foreach ($dayofs as $day_of) {
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
                inline: true,
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

@extends('layouts.appadmin')

@section('content')
  
<div class="container">
    <h1 class="text-center h-marg">ايام الإغلاق</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.dayof') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="day_of_one" class="col-md-4 col-form-label text-md-right">غلق اليوم الاول</label>

                            <div class="col-md-6">
                                <input id="day_of_one" value="<?php

                                 foreach($dayofs as $dayof){
                                 echo $dayof->day_of_one;
                                 };
                                
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_one">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_of_two" class="col-md-4 col-form-label text-md-right">غلق اليوم الثانى</label>

                            <div class="col-md-6">
                                <input id="day_of_two" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_two;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_two">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_of_three" class="col-md-4 col-form-label text-md-right">غلق اليوم الثالث</label>

                            <div class="col-md-6">
                                <input id="day_of_three" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_three;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_three">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_of_four" class="col-md-4 col-form-label text-md-right">غلق اليوم الرابع</label>

                            <div class="col-md-6">
                                <input id="day_of_four" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_four;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_four">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_of_five" class="col-md-4 col-form-label text-md-right">غلق اليوم الخامس</label>

                            <div class="col-md-6">
                                <input id="day_of_five" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_five;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_five">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_of_six" class="col-md-4 col-form-label text-md-right">غلق اليوم السادس</label>

                            <div class="col-md-6">
                                <input id="day_of_six" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_six;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_six">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_of_seven" class="col-md-4 col-form-label text-md-right">غلق اليوم السابع</label>

                            <div class="col-md-6">
                                <input id="day_of_seven" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_seven;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_seven">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="day_of_from_one" class="col-md-4 col-form-label text-md-right">غلق اليوم من</label>

                            <div class="col-md-6">
                                <input id="day_of_from_one" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_from_one;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_from_one">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="day_of_to_one" class="col-md-4 col-form-label text-md-right">غلق اليوم الى </label>

                            <div class="col-md-6">
                                <input id="day_of_to_one" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_to_one;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_to_one">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="day_of_from_two" class="col-md-4 col-form-label text-md-right">غلق اليوم من</label>

                            <div class="col-md-6">
                                <input id="day_of_from_two" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_from_two;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_from_two">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="day_of_to_two" class="col-md-4 col-form-label text-md-right">غلق اليوم الى </label>

                            <div class="col-md-6">
                                <input id="day_of_to_two" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_to_two;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_to_two">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="day_of_from_three" class="col-md-4 col-form-label text-md-right">غلق اليوم من</label>

                            <div class="col-md-6">
                                <input id="day_of_from_three" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_from_three;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_from_three">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="day_of_to_three" class="col-md-4 col-form-label text-md-right">غلق اليوم الى </label>

                            <div class="col-md-6">
                                <input id="day_of_to_three" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_to_three;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_to_three">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="day_of_from_four" class="col-md-4 col-form-label text-md-right">غلق اليوم من</label>

                            <div class="col-md-6">
                                <input id="day_of_from_four" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_from_four;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_from_four">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="day_of_to_four" class="col-md-4 col-form-label text-md-right">غلق اليوم الى </label>

                            <div class="col-md-6">
                                <input id="day_of_to_four" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_to_four;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_to_four">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="day_of_from_five" class="col-md-4 col-form-label text-md-right">غلق اليوم من</label>

                            <div class="col-md-6">
                                <input id="day_of_from_five" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_from_five;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_from_five">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="day_of_to_five" class="col-md-4 col-form-label text-md-right">غلق اليوم الى </label>

                            <div class="col-md-6">
                                <input id="day_of_to_five" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_to_five;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_to_five">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="day_of_from_six" class="col-md-4 col-form-label text-md-right">غلق اليوم من</label>

                            <div class="col-md-6">
                                <input id="day_of_from_six" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_from_six;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_from_six">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day_of_to_six" class="col-md-4 col-form-label text-md-right">غلق اليوم الى </label>

                            <div class="col-md-6">
                                <input id="day_of_to_six" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_to_six;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_to_six">
                            </div>
                        </div>
                        <hr>
                         
                        <div class="form-group row">
                            <label for="day_of_from_seven" class="col-md-4 col-form-label text-md-right">غلق اليوم من</label>

                            <div class="col-md-6">
                                <input id="day_of_from_seven" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_from_seven;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_from_seven">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="day_of_to_seven" class="col-md-4 col-form-label text-md-right">غلق اليوم الى </label>

                            <div class="col-md-6">
                                <input id="day_of_to_seven" value="<?php
                                foreach($dayofs as $dayof){
                                echo $dayof->day_of_to_seven;
                                };
                                ?>" type="text" class="flatpickrone form-control" readonly name="day_of_to_seven">
                            </div>
                        </div>
                        <hr>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary primary-admin">
                                    حفظ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
                   <input class="flatpickrtwo form-control" type="text" readonly="readonly">
        </div>
</div>

@endsection
