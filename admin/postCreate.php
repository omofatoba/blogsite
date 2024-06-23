<?php
require_once('../config.php');
require_once("../action/post_auth.php");

if (isset($_SESSION['user'])) {
 
}else{
    header("location:../login.php");
}
require_once("head.php");
?>

    <link rel="stylesheet" href="form.css">
</head>

<body>

    <div class="wrapper">
        <div class="title">
          Post Creation Form
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form">
           <div class="inputfield">
              <label>Title</label>
              <input type="text" class="input" name="title" value="<?php echo $title ?>">
              <p class="err"><?php echo $error['title']?></p>
           </div>  
            <div class="inputfield">
              <label>Tag</label>
              <input type="text" class="input" name="tag" value="<?php echo $tag ?>">
              <p><?php echo $error['tag'] ?></p>
           </div>  

           <div class="inputfield">
            <label>Content</label>
           <textarea name="content" class="input" id=""><?php echo $content ?></textarea>

           <p><?php echo $error['content']?></p>
         </div>  

         <div class="inputfield">
          <p class="err"><?php echo $error['image'] ?></p>
          <span class="fakebtn btn" style="background-color: paleturquoise;" >Upload Picture</span>

          <input type="file" name="image" accept="jpg,png,jpeg" id="image" style="visibility: hidden;">

          <img src="" class="view mlt" alt="">
         </div>

       
        
          <div class="inputfield">
          <button type="submit" class="btn" name="post">POST</button>
          </div>
        </div>
    </form>
    </div>

    <script>

document.querySelector(".fakebtn").addEventListener('click',()=>{
  document.querySelector("#image").click();
})

      let image=document.querySelector("#image");
      image.addEventListener("change",function(e) {
      if (this.files && this.files[0]) {
        const reader=new FileReader();

        reader.onload=function(event) {
          document.querySelector(".view").src=event.target.result;
        };

        reader.readAsDataURL(this.files[0])
      }
      });

    </script>


</body>
</html>