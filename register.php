<?php

require_once("config.php");

require_once("action/authenticate.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/admin.css">
    <script src="script/admin.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
<div class="form">
<p class="head">Welcome</p>

<form action="" method="POST">


<p class="text-danger"><?php echo $error['gen'] ?></p>


<input type="text" class="form-control w-50 mt-4" name="name" value="<?php echo $name?>" id="" placeholder="ENTER NAME">
<p class="text-danger"><?php echo $error['name'] ?></p>

<input type="email" class="form-control w-50 mt-4" name="email" value="<?php echo $email
?>" id="" placeholder="ENTER EMAIL">
<p class="text-danger"><?php echo $error['email'] ?></p>

<input type="password" class="form-control w-50 mt-4" name="pass" id="" placeholder="ENTER PASSWORD">
<p class="text-danger"><?php echo $error['password'] ?></p>

<input type="password" class="form-control w-50 mt-4" name="pass_c" id="" placeholder="CONFIRM PASSWORD">



    <button type="submit" name="register" class="btn btn-primary mt-4 w-50">Submit</button>

    <p class="mt">Have An Account? <a href="login.php">Login</a></p>
</form>

</div>


</body>
</html>