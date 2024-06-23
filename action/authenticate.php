<?php
$error=['name'=>"",'email'=>'','password'=>'','gen'=>'',"ind"=>0];

$name='';
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
 

$select="SELECT id,name,email,pic,status  FROM user WHERE email='$email' AND password='$password'";

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


function register() {
    
    global $connect,$error,$name,$email,$password;
    if (isset($_POST['register'])) {
       
        if (empty($_POST['name'])) {
            $error['name']="Name Field Must Not Be Empty";
            return false;
        }else{
            $name=strip($_POST['name']);
         
        }
        if (empty($_POST['email'])) {
            $error['email']="Email Field Must Not Be Empty";
            return false;
        }else {
           if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
                  $email=strip($_POST['email']);
           }else{
            $error['email']="INVALID EMAIL ADDRESS";
            return false;
           }
        }

        if (strlen($_POST['pass']) <8)  {
            $error['password']="PASSWORD MUST BE 8 CHARACTERS LONG";
            return false;
        }else{

            if (strip($_POST['pass']) === strip($_POST['pass_c'])) {
                
                $password=md5(strip($_POST['pass']));
            }else{
                $error['password']="PASSWORDS DO NOT MATCH";
                return false;
            }
        }


        $check="SELECT id FROM user WHERE email ='$email'";

        $cquery=mysqli_query($connect,$check);

        $row=mysqli_num_rows($cquery);
        if ($row === 0) {
         
        $insert="INSERT INTO user(name,email,password,status,pic) VALUES('$name','$email','$password','user','12345.jpg')";

        $query=mysqli_query($connect,$insert);

       $id= mysqli_insert_id($connect);

        if ($query) {
           //echo $id;
        // 
       
$select="SELECT id,name,email,pic,status FROM user WHERE id ='$id'";


$ds=mysqli_query($connect,$select);

$data=mysqli_fetch_assoc($ds);

$_SESSION['user']=$data;

header("location:./user/dashboard.php");

    }  
        }else{
            $error['gen']="Email Has Been taken";
        }


    }
}



register();



function strip($val)  {

    return htmlentities(strip_tags($val));
}

?>