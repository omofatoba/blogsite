
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
            <p><a href="index.php">Home</a></p>
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
            <div class="cred">
                <?php if(isset($_SESSION['user'])){?>
                     <a href="logout.php">Logout</a>
         <?php  }else {?>
                <a href="login.php">Login</a>
           <?php  } ?>

        </div>
        </div>

       
        <div class="space"></div>
    