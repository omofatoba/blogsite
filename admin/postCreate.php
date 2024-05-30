<?php
require_once('../config.php');
require_once("../action/post_auth.php");

if (isset($_SESSION['user'])) {
 
}else{
    header("location:../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/copied.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php require_once("sidenav.php") ?>
    
<form action="" method="POST">

<input type="text" class="form-control w-50 mb-4" name="title" id="" placeholder="Title">

<input type="text" class="form-control w-50 mb-4"  name="tag" id="" placeholder="Tag">

<textarea name="content" class="form-control w-50 mb-4"  id="" placeholder="Content"></textarea>

<button type="submit" name="post" class="btn btn-primary">POST</button>

</form>

</body>
</html>