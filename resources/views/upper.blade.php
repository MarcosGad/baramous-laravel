<div class="upper">

    <div class="upper-bar-aya">
        <?php $ayas = DB::select('select name from ayas ORDER BY id DESC limit 1');  ?>
       @foreach($ayas as $aya)
        <marquee class="upper-bar-two-aya" direction="right" width="100%" scrolldelay="70" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();"> {{$aya->name}}  </marquee> 
       @endforeach
    </div>

    <div class="upper-bar">
        <?php $alarms = DB::select('select name from alarms ORDER BY id DESC limit 1');  ?>
        @foreach($alarms as $alarm)
        <p class="upper-bar-desc"> {{$alarm->name}}  </p> 
        @endforeach
    </div>

</div>