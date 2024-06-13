<?php
require_once('config.php');
require_once("action/need.php");

$id=$_REQUEST['id'];

$post=specPost($id);

$author=getAuthor($post['author']);


$user=[];
if (isset($_SESSION['user'])) {
  $user=$_SESSION['user'];
}




$views=$post['views'];
$chn=$views+1;

$up="UPDATE post SET views='$chn' WHERE id ='$id'";

mysqli_query($connect,$up);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/ind.css">
    <script src="script/comment.js" defer></script>
</head>
<body>

<style>
  a{
    color: inherit;
    text-decoration: none;
  }
</style>

<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <article class="blog-card">
        <div class="blog-card__background">
          <div class="card__background--wrapper">
            <div class="card__background--main" style="background-image: url('uploads/<?php echo $post['image'] ?>');">
              <div class="card__background--layer"></div>
            </div>
          </div>
        </div>
        <div class="blog-card__head">
          <span class="date__box">
            <span class="date__day">11</span>
            <span class="date__month">JAN</span>
          </span>
        </div>
        <div class="blog-card__info">
          <h5><?php echo $post['title'] ?></h5>
          <p>
            <a href="#" class="icon-link mr-3"><i class="fa fa-pencil-square-o"></i><?php echo $author['name']?></a>
            <a href="#" class="icon-link"><i class="fa fa-comments-o"></i> 150</a>
          </p>
            <p><?php echo $post['content'] ?></p>       
        </div>
      </article>
    </div>
  </div>
</div>

<section class="detail-page">
  <div class="container mt-5">
    
  </div>




  
<!-- comments container -->
<div class="comment_block">

 <!-- used by #{user} to create a new comment -->




<div class="holder">

</div>



 <div class="create_new_comment">

 <div class="user_avatar">
     <img src="uploads/<?php if (isset($_SESSION['user']))  { echo $user['pic']; }?>" >
 </div>
 <div class="input_comment">
  <p class="pep">Reply To <span class="tg"></span> <span class="x">X</span></p>
  <p class="se">Stop Editing</p>
 <textarea name="" class="txt content" cols="50" rows=""></textarea>



 <?php if (isset($_SESSION['user'])) {?>
  <p class="hjk btn_comment">Post</p>

 <input type="hidden" value='0' class="parent_id">
<input type="hidden" class="shm" value="0">
<input type="hidden" class="com_id" value="0">
     <input type="hidden" class="user_id" value="<?php echo $user['id'] ?>">
     <input type="hidden" class="post_id" value="<?php echo $post['id']?>">
     <input type="hidden" class="user_name" value="<?php echo $user['name']?>">
     <input type="hidden" class="user_image" value="<?php echo $user['pic']?>">
     
     <?php }else{?>
      <p class="hjk" id="chn">Login To Comment On Post </p>

   <?php   }?>
 </div>

</div>
</div>
</section>

</body>
</html>