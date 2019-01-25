<?php
date_default_timezone_set("Asia/Bangkok");
// function add_date($givendate,$day=0,$mth=0,$yr=0) {
// 		$cd = strtotime($givendate);
// 		$newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
// 		date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
// 		date('d',$cd)+$day, date('Y',$cd)+$yr));
// 		return $newdate;
//      }

// echo add_date("2010-12-09",3,2,1);
$time = trim(date('d-m-Y H:i:s',strtotime("+1 day")))."<br>";
echo $time;
?>