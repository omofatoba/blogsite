<?php
require_once("config.php");

require_once("action/need.php");

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
   
    $newRpl=explode(" ",$dat);   


    $time=$newRpl[1];
    $epl=explode(":",$time);  

    $current=explode(':',date('G:i:s'));
  
   //hour echo $current[0]-$epl[0];

   //seconds
   $sec=$current[2]-$epl[2];

   echo $sec;  

}
//var_dump($short);

function auh($id,$tem) {
    global $connect;
    $select ="SELECT * FROM user WHERE id='$id'" ;
    $query=mysqli_query($connect,$select);
    $result=mysqli_fetch_assoc($query);
   echo $result[$tem];
}




$brek=brk();

$rps=rp();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/index.css">
    <script src="https://kit.fontawesome.com/d335dcf51b.js" crossorigin="anonymous"></script>
    <script src="script/index.js" defer></script>
    <script src="script/mis.js" defer></script>
</head>
<body>
    <div class="tip">
        <div class="pl">
           <a href=""> <i class="fa-brands fa-facebook-f"></i></a>
           <a href=""> <i class="fa-brands fa-x-twitter"></i></a>
           <a href=""> <i class="fa-brands fa-square-instagram"></i></a>
        </div>

        <div class="pr">
            <p><a href="tel:+2349017251972">+2349017251972</a></p>
            <p><a href="mailto:okoloemeka37@gmail.com">support@gmail.com</a></p>
        </div>
    </div>

    <div class="conty">
        <div class="navb">
            <p><a href="">Home</a></p>
            <p><a href="">ARCHIVE</a></p>
            <p><a href="">Category</a></p>
         <div class="hj">
            <p class="">post type <span><i class="fa-solid fa-angle-down"></i></span></p>
            <div class="thy">
                <p class="a">Audio Post</p>
                <p class="a">Audio Post</p>
                <p class="a">Audio Post</p>
                <p class="a">Audio Post</p>
                <p class="a">Audio Post</p>
            </div>
        </div>   
            <p><a href="">about</a></p>
            <p><a href="">contact</a></p>

            <div class="dfl">
                <input type="text"  id="search">
            </div>
        </div>

        <div class="space"></div>
      
     <div class="top_p">
     <?php foreach ($old as $data) {?>

    
   

  
                <div class="t1" style="background-image: url(image/top.webp);">
                    <div class="tw">
                        <div class="al">
                        <p class="tag"><?php echo $data['tag'] ?></p>
                        <p class="top_title"><a href="ind.php?id=<?php echo $data['id']?>"><?php echo $data['title'] ?></a></p>
                        <div class="mot">
                        <p class="er"><i class="fa-solid fa-user"></i> <span><?php auh($data['author'],'name') ?></span></p>
                        <p class="er"><i class="fa-solid fa-calendar-days"></i> <span><?php dat_maker($data['created_at']) ?></span></p>
                            <p class="er"><i class="fa-solid fa-comment"></i> <span>3 comments</span></p>
                        </div>
                    </div>
                    </div>
                    </div>

                    
<?php }?>   

             <div class="sid">
                     
                    <?php foreach ($hv as $view) { ?>
                        <div class="t2" style="background-image: url(uploads/<?php echo $view['image']?>);">
                                <div class="tw2">
                                    <div class="al2">
                                    <p class="tag"><?php echo $view['tag'] ?></p>
                                    <p class="top_title"><a href="ind.php?id=<?php echo $view['id']?>"><?php echo $view['title'] ?></a></p>
                                    <div class="mot">
                                        <p class="er"><i class="fa-solid fa-user"></i> <span><?php auh($view['author'],'name') ?></span></p>
                                        <p class="er"><i class="fa-solid fa-calendar-days"></i> <span><?php dat_maker($view['created_at']) ?></span></p>
                                        <p class="er"><i class="fa-solid fa-comment"></i> <span><?php echo $view['num_comment'] ?>comments</span></p>
                                    </div>
                                </div>
                                </div>
                                </div>


                    <?php }?>
                           
               </div>
         
        </div>

        <div class="brn">
            <p class="th">Breaking News:</p>
<?php foreach ($brek as $ty) {?>
    <p class="df"><a href="ind.php?id=<?php echo $ty['id']?>"><?php echo substr($ty['content'],0,30) ?></a></p>
<?php } ?>

        </div>




    <div class="mains">
        <div class="left">
            <p class="navb">Recent Post</p>

            <div class="container">
<?php foreach ($rps as $data) {?>

  <div class="card">
    <div class="card__header">
      <img src="uploads/<?php echo $data['image'] ?>" alt="card__image" class="card__image" width="600">
    </div>

    <div class="card__body">
      <span class="tag "><?php echo $data['tag'] ?></span>
      <h4><a href="ind.php?id=<?php echo $data['id']?>"><?php $data['title'] ?></a></h4>
      <p><?php echo substr($data['content'],0,50) ?></p>
    

    
      <div class="card__footer">
      <div class="user">
        <img src="uploads/<?php auh($data['author'],"pic") ?>" alt="user__image" class="user__image">
        <div class="user__info">
          <h5><?php auh($data['author'],'name') ?></h5>
          <small>2h ago</small>


          <?php time_set($data['created_at']); ?>

          
        </div>
      </div>
    </div>
</div>
   
  </div>
 

  <?php }?>


</div>
        </div>
    </div>






    </div>
</body>
</html>
