<?php
require_once("config.php");

require_once("action/need.php");
require_once("action/etc.php");




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

<?php require_once('needs/navbar.php');?>
        
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
          <small><?php time_set($data['created_at']); ?></small>
          
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
