<?php


$hv=h_view();
$old=old_post();
$short = [
"01"=>  'Jan', 
 "02"=> 'Feb', 
 "03"=> 'Mar', 
"04"=>  'Apr', 
 "05"=> 'May', 
 "06"=> 'Jun', 
 "07"=> 'Jul', 
 "08"=> 'Aug', 
 "09"=> 'Sep', 
 "10"=> 'Oct', 
 "11"=> 'Nov', 
 "12"=> 'Dec'
];
function dat_maker($dat) {
    global $short;
$newRpl=explode(" ",$dat);   

$epl=explode("-",$newRpl[0]);    

$month=$short[$epl[1]];

$full=$epl[2]." ".$month ." ,".$epl[0];
echo $full;
}

function time_set($dat) {
   
    $time=new DateTime($dat);
//var_dump($time);
   
    $thy= new DateTime();

 $inter= $thy->diff($time);

$day= $inter->format('%a');

 if ($day > 0) {
    echo $day." Days " ;
 }else{


    $newRpl=explode(" ",$dat);   
    $time=$newRpl[1];
    $epl=explode(":",$time);  

    $current=explode(':',date('G:i:s'));


$cudate= ($current[0]*3600)+($current[1]*60)+$current[2];


$database= ($epl[0]*3600)+($epl[1]*60)+$epl[2];

$ret='';


if ($database > $cudate) {
  $ret=$database-$cudate;
}else{
$ret=$cudate-$database;
}

    
if ($ret < 60) {
  echo $ret;
}else if(($ret>60) && ($ret < 3600)) {
   echo $ret/60 ."mins";
}else if ($ret > 3600) {
  
$h=floor($ret/3600);

$m=floor(($ret%3600)/60);

$s=($ret%3600)%60;


echo $h ." hrs ".$m." min ".$s." secs";


}
}

  
  
}
//var_dump($short);

function auh($id,$tem) {
    global $connect;
    $select ="SELECT * FROM user WHERE id='$id'" ;
    $query=mysqli_query($connect,$select);
    $result=mysqli_fetch_assoc($query);
   echo $result[$tem];
}



?>