<?php
require_once("config.php");

session_destroy();
session_unset();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        

        localStorage.setItem("url","http://localhost/blogsite/admin/dashboard.php");
window.location.replace("http://localhost/blogsite/login.php");
    </script>
</body>
</html>