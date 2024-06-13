<?php
$error=['email'=>'','password'=>'','gen'=>'',"ind"=>0];


$email='';
$password='';

function login(){

    global $connect,$error, $email, $password;


if (isset($_POST['login'])) {


if (empty($_POST['email'])) {
   $error['email']="Email Field Must Not Be Empty";
   return false;
}else{
    $email=strip($_POST['email']);
}

if (empty($_POST['pass'])) {

    $error['password']="Password Field Must Not Be Empty";
    return false;
 }else{
    $password=md5(strip($_POST['pass']));
 }
 

$select="SELECT id,name,email,pic  FROM user WHERE email='$email' AND password='$password'";

$query=mysqli_query($connect,$select);

$row=mysqli_num_rows($query);



if ($row === 0) {
    $error['gen']="Credentials Not Found";
    $error['ind']=0;
}else{
    $data=mysqli_fetch_assoc($query);

    $_SESSION['user']=$data;
    $error['ind']=1;
   // header('location:admin/dashboard.php');

}


}

}


login();

function strip($val)  {
    return htmlentities(strip_tags($val));
}

?>