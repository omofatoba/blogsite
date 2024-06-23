<?php
$error=['title'=>"",'tag'=>"","content"=>"","image"=>"","gen"=>""];

$title='';$tag='';$content='';

if (isset($_POST['post'])) {
  
function post(){
    global $error,$title,$tag,$content,$connect;
 if (empty($_POST['title'])) {
    $error['title']="The Title Field Is Required";
    return false;
 }else{
     $title=strip($_POST['title']);
   
 }
 
 if (empty($_POST['tag'])) {
     $error['tag']="The Tag Field Is Required";
     return false;
  }else{
      $tag=strip($_POST['tag']);
  }
  
  if (empty($_POST['content'])) {
     $error['content']="The Content Field Is Required";
     return false;
  }else{
      $content=strip($_POST['content']);
  } 


  if (isset($_FILES['image'])) {
    $image=$_FILES['image'];


    $ext=["jpg","png","jpeg","gif",'webp'];


    if (!in_array(pathinfo($image['name'],PATHINFO_EXTENSION),$ext)) {
        $error['image']="The File Format Is Not Accpted Here";
        return false; 
    }
    $farr=[];

    while (count($farr) < 5) {
      $rand=rand(0,9);
      array_push($farr,$rand);
    }

    $pic=implode("",$farr).".jpg";


    $file="../uploads/".$pic;

    move_uploaded_file($image['tmp_name'],$file);


  }



  $id_user=$_SESSION['user']['id'];

  $insert="INSERT INTO post(title,tag,content,author,image) VALUE('$title','$tag','$content','$id_user','$pic')";
 
  $query=mysqli_query($connect,$insert);


  if ($query) {
   if ($_SESSION['user']['status']=="Admin") {
    header("location:../admin/post.php");
   }else{
    header("location:../user/dashboard.php");
   }
   }else{
     $error['gen']="Something Went Wrong";
   }
}
 

post();
}




if (isset($_POST['edit'])) {
 
function editPost(){
    $id=$_POST['id'];
    global $error,$title,$tag,$content,$connect;

    $file=$_POST['oldImage'];



   if (isset($_FILES['image'])) {

     $image=$_FILES['image'];

     $ext=["jpg","png","jpeg","gif",'webp'];
    
     if ($image['size']>0) {
       $imgPath=pathinfo($image['name'],PATHINFO_EXTENSION);

        if (!in_array($imgPath,$ext)) {
            return false;
        }      $art=[];

        while (count($art) < 5) {
            $rand=rand(0,9);
            array_push($art,$rand);
        }

        $file=implode('',$art).".jpg";

        move_uploaded_file($image['tmp_name'],"../uploads/".$file);

        unlink("../uploads/".$_FILES['oldImage']);
     }
    }

    echo $file;


 if (empty($_POST['title'])) {
    $error['title']="The Title Field Is Required";
    return false;
 }else{
     $title=strip($_POST['title']);
   
 }
 
 if (empty($_POST['tag'])) {
     $error['tag']="The Tag Field Is Required";
     return false;
  }else{
      $tag=strip($_POST['tag']);
  }
  
  if (empty($_POST['content'])) {
     $error['content']="The Content Field Is Required";
     return false;
  }else{
      $content=strip($_POST['content']);
  }
  $id_user=$_SESSION['user']['id'];

  $update="UPDATE post SET title ='$title', tag='$tag', content='$content', image='$file' WHERE id='$id' ";
 
$query=mysqli_query($connect,$update);
 
  if ($query) {
    if ($_SESSION['user']['status']=="Admin") {
        header("location:../admin/post.php");
       }else{
        header("location:../user/dashboard.php");
       }
  }else{
    $error['gen']="Something Went Wrong";
  }  
 
}
 editPost();

}











function strip($val) {

    return htmlentities(strip_tags($val));


}
?>