<?php
$error=['name'=>"",'email'=>'','password'=>'','gen'=>'','image'=>""];


$email='';
$name='';
function email(){

    global $email,$name,$connect;
    
if(isset($_POST['save'])){

if (empty($_POST['name'])) {
$error['name']="Name Field Must not Be Empty";
}else{
$name=strip($_POST['name']);
}


if (empty($_POST['email'])) {
    $error['email']="Email Field Must not Be Empty";
}else{
    $email=strip($_POST['email']);
}

$file=$_POST['oldimage'];

if (isset($_FILES['image'])) {

    $image=$_FILES['image'];

    $ext=["jpg","png","jpeg","gif",'webp'];
   
    if ($image['size']>0) {
      $imgPath=pathinfo($image['name'],PATHINFO_EXTENSION);

       if (!in_array($imgPath,$ext)) {
        $error['image']="Allowed Extension Includes jpg , png , jpeg , gif , webp" ;
           return false;
       }   
          $art=[];

       while (count($art) < 5) {
           $rand=rand(0,9);
           array_push($art,$rand);
       }

       $file=implode('',$art).".jpg";

       move_uploaded_file($image['tmp_name'],"../uploads/".$file);

       unlink("../uploads/".$_POST['oldimage']);
    }
   }

   $update="UPDATE user SET name='$name', email='$email',pic= '$file' WHERE email ='$email' ";
   $query=mysqli_query($connect,$update);
  if ($query) {
   $_SESSION['user']['name']=$name;
   $_SESSION['user']['email']=$email;
   $_SESSION['user']['pic']=$file;
  }
}




}

email();


function password() {
    global $connect, $error;
    if (isset($_POST['passwordSave'])) {


     $email=$_SESSION['user']['email'];
     $old=md5($_POST['oldPass']);

     $new=$_POST['newPass'];
     $c_pass=$_POST['Cpass'];


$select="SELECT id  FROM user WHERE email='$email' AND password='$old'";

$query=mysqli_query($connect,$select);

$row=mysqli_num_rows($query);

if ($row !== 0) {
 if (strlen($new) <8) {
    $error['password']="PASSWORD MUST BE 8 CHARACTERS LONG";
 }else{
    if ($new=== $c_pass) {
        $rt=md5($new);
        $update="UPDATE user SET password='$rt' WHERE email ='$email' ";
        $query=mysqli_query($connect,$update);
    }else{
        $error['gen']="PASSWORD DO NOT MATCH";   
    }
 }
}else{
$error['gen']="Wrong password";
}

    }
}

password();

function strip($val)  {

    return htmlentities(strip_tags($val));
}
