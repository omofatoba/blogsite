<div class="nav">

  <div class="admin-info">
  
      <img src="<?php echo "../uploads/".$_SESSION['user']['pic']?>" alt="Admin Avatar">
      <span>Welcome, <?php echo $_SESSION['user']['name'] ?></span>
  </div>

  <a class="non" href="../index.php">HOME</a>

  <a class="non" href="dashboard.php">Dashboard</a>

  <a class="non" href="../admin/postCreate.php">Create Posts</a>
  <a class="non" href="post.php">Posts</a>

 
  <a class="non" href="../needs/settings.php">Settings</a>

 
  <a class="non" href=>Notification</a>

<p><a href="../logout.php">Logout</a></p>  

</div>