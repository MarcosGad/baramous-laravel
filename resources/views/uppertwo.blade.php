<div class="upper">

    <div class="upper-bar-aya" style="margin-top: 20px;">
        <?php $ayastarts = DB::select('select name from ayastarts ORDER BY id DESC limit 1');  ?>
       @foreach($ayastarts as $ayastart)
        <marquee class="upper-bar-two-aya" direction="right" width="100%" scrolldelay="70" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();"> {{$ayastart->name}}  </marquee> 
       @endforeach
    </div>

    <div class="upper-bar">
        <?php $alarmstarts = DB::select('select name from alarmstarts ORDER BY id DESC limit 1');  ?>
        @foreach($alarmstarts as $alarmstart)
        <p class="upper-bar-desc"> {{$alarmstart->name}}  </p> 
        @endforeach
    </div>

</div>