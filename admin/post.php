<?php 
require_once('../config.php');
require_once("head.php");
require_once("../action/need.php");
$user_id=$_SESSION['user']['id'];
$posts=getauthPost($user_id);


?>

<link rel="stylesheet" href="../styles/admin.css">
</head>

<body>


<header>
<h2>POST</h2>
   
  </header>


<?php require_once("sidenav.php") ?>




?>


<section class="articles">

<?php foreach ($posts as $post) { ?>

  <article>
    <div class="article-wrapper">
      <figure>
        <img src="../uploads/<?php echo $post['image']?>" alt="" />
      </figure>
      <div class="article-body">

        <h2><a href="../ind.php?id=<?php echo $post['id']?>"><?php echo $post['title'] ?></a></h2>
        <small><?php echo $post['tag'] ?></small>
        <p><?php echo substr($post['content'],0,80) ?></p>
        <a href="#" class="read-more">Read more <span class="sr-only">about this is some title</span></a>
          <div class="mot">
                            <p class="er"><i class="fa-solid fa-eye"></i> <span>0</span></p>
                            <p class="er"><i class="fa-solid fa-calendar-days"></i> <span><?php echo $post['created_at'] ?></span></p>
                            <p class="er"><i class="fa-solid fa-comment"></i> <span>0 comments</span></p>
             </div>
   
                       
             <div class="rd">
                            <p class="ed">
                                <a href="edit.php?id=<?php echo $post['id'] ?>">Edit</a>
                            </p>

                            <p class="delete">
                                <a href="../action/deletePost.php?id=<?php echo $post['id']?>">Delete</a>
                            </p>
                        </div>
      </div>

     

    </div>
  </article>
  
<?php } ?>

</section>
</body>
</html>