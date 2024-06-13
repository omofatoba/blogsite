<div class="nav">

  <div class="admin-info">
  
      <img src="<?php echo "../image/".$_SESSION['user']['pic']?>" alt="Admin Avatar">
      <span>Welcome, <?php echo $_SESSION['user']['name'] ?></span>
  </div>

  <a class="non" href="../index.php">HOME</a>

  <a class="non" href="{{route('dashboard')}}">Dashboard</a>
  <a class="non" href="{{route('alusers')}}">Users</a>
  <a class="non" href="{{route('Addbook')}}">AddBooks</a>
  <a class="non" href="{{route('AdminBooks')}}">Books</a>
  <a class="non" href="postCreate.php">Create Posts</a>
  <a class="non" href="post.php">Posts</a>

  <a class="non" href="#">Orders</a>
  <a class="non" href="#">Customers</a>
  <a class="non" href="{{route('report_show')}}">Reports</a>
  <a class="non" href="{{route('setting')}}">Settings</a>
  

 
  <a class="non" href="{{route('notice')}}">Notification</a>

<p><a href="../logout.php">Logout</a></p>  

</div>