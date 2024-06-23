<?php 
require_once('../config.php');
require_once("../admin/head.php");
require_once("../action/need.php");
require_once("../action/user_setting.php");


$user_id=$_SESSION['user']['id'];
$posts=getauthPost($user_id);


?>

<link rel="stylesheet" href="../styles/admin.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>


<header>
<h2>POST</h2>
   
  </header>


<?php
if ($_SESSION['user']['status']=="Admin") {
    require_once("../admin/sidenav.php");
}else{
    require_once("../user/sidnav.php");
}

?>




?>




<form action="" method="POST" enctype="multipart/form-data">

<div class="admin-info">
  
  <img src="<?php echo "../uploads/".$_SESSION['user']['pic']?>" alt="Admin Avatar" id="fakebtn">

  <p class="text-danger"><?php echo $error['image'] ?></p>

</div>


<p class="text-danger"></p>



<input type="text" class="form-control d-block w-50 mt-4" name="name" value="<?php echo $_SESSION['user']['name']?>" id="" placeholder="ENTER NAME">
<p class="text-danger"><?php echo $error['name'] ?></p>

<input type="email" class="form-control w-50 mt-4" name="email" value="<?php echo $_SESSION['user']['email']?>" id="" placeholder="ENTER EMAIL">
<p class="text-danger"><?php echo $error['email'] ?></p>

<button type="submit" name="save" class="btn btn-primary mt-4 w-50">Save</button>

<input type="file" name="image" id="image" style="visibility: hidden;">

<input type="hidden" name="oldimage" value="<?php echo $_SESSION['user']['pic']?>">
</form>





<form action="" method="POST">

<p class="gth btn btn-primary">Change Password</p>

<div class="fh" style="display: none;">
<input type="password" class="form-control w-50 mt-4" name="oldPass" id="" placeholder="ENTER OLD PASSWORD">

<input type="password" class="form-control w-50 mt-4" name="newPass" id="" placeholder="ENTER NEW PASSWORD">

<input type="password" class="form-control w-50 mt-4" name="Cpass" id="" placeholder="CONFIRM PASSWORD">

<input type="submit" class="btn btn-primary mt-2" name="passwordSave" value="Save Password" >
</div>
<p class="text-danger"></p>


</form>




<script>

    document.querySelector(".gth").addEventListener("click",()=>{
   

        if ( document.querySelector(".fh").style.display == "block") {
             document.querySelector(".fh").style.display="none"
        }else{
             document.querySelector(".fh").style.display="block"
        }
    })

document.querySelector("#fakebtn").addEventListener('click',()=>{
  document.querySelector("#image").click();
})

      let image=document.querySelector("#image");
      image.addEventListener("change",function(e) {
      if (this.files && this.files[0]) {
        const reader=new FileReader();

        reader.onload=function(event) {
          document.querySelector("#fakebtn").src=event.target.result;
        };

        reader.readAsDataURL(this.files[0])
      }
      });

    </script>

</body>
</html>