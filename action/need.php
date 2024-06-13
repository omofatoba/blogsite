
<?php
$select="SELECT * FROM post";

$query=mysqli_query($connect,$select);

$row=mysqli_num_rows($query);




function getPost($id) {
    global $connect;

$select="SELECT * FROM post WHERE id ='$id'";
$query=mysqli_query($connect,$select);
return $query;
}

function getauthPost($id) {
    global $connect;

$select="SELECT * FROM post WHERE author='$id'";
$query=mysqli_query($connect,$select);
return $query;
}


function specPost($id)  {
    global $connect;
    $select ="SELECT * FROM post WHERE id='$id'" ;
    $query=mysqli_query($connect,$select);
    $result=mysqli_fetch_assoc($query);
return $result;
}

function getAuthor($id)  {
    global $connect;
    $select ="SELECT * FROM user WHERE id='$id'" ;
    $query=mysqli_query($connect,$select);
    $result=mysqli_fetch_assoc($query);
return $result;
}


//select 2 post for views ;

function h_view()  {
    global $connect;
    $select ="SELECT * FROM post ORDER BY views DESC LIMIT 2";
    $query=mysqli_query($connect,$select);
   
return $query;
}


function old_post()  {
    global $connect;
    $select ="SELECT * FROM post  LIMIT 3 ";
    $query=mysqli_query($connect,$select);
   
return $query;
}


function brk()  {
    global $connect;
    $select ="SELECT * FROM post ORDER BY id DESC LIMIT 3" ;
    $query=mysqli_query($connect,$select);

return $query;
}

//recent post
function rp()  {
    global $connect;
    $select ="SELECT * FROM post ORDER BY id DESC LIMIT 4";
    $query=mysqli_query($connect,$select);
   
return $query;
}
?>