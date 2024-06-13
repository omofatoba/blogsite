<?php
$connect =mysqli_connect("localhost","Blog",'','Blog');

$id=$_REQUEST['id'];

$select="SELECT image FROM post WHERE id ='$id' LIMIT 1";
$query=mysqli_query($connect,$select);
$result=mysqli_fetch_assoc($query);
$image=$result['image'];


unlink("../uploads/".$image);


$delete="DELETE FROM post WHERE id='$id'";


$query=mysqli_query($connect,$delete);


if ($query) {
  header("location:../admin/dashboard.php");
   unlink("../uploads/".$image);
   }
?>