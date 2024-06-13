<?php
require_once("../config.php");

$info=json_decode(file_get_contents('php://input'),true);

function create() {
    global $connect,$info;
    if ($info['type']=="create") {
        $user_id=$info['userId'];

        $post_id=$info['postId'];
        
        $content=$info['content'];

        $user_name=$info['user_name'];

        $user_image=$info['user_image'];


        $parent_id=$info['parent_id'];




        
        $insert="INSERT INTO comments(user_id,post_id,content,name,image,parent_id) VALUES('$user_id','$post_id','$content','$user_name','$user_image','$parent_id')";
        
        $query=mysqli_query($connect,$insert);
        
        
        
        if ($query) {
       get();
        }else{
            echo "something went wrong";
        }
    }
    
}

create();

function get()  {
    global $connect,$info;
    
    $post_id=$info['postId'];
    
   $select="SELECT * FROM comments WHERE parent_id=0 AND post_id='$post_id' ORDER BY id DESC ";
   $query=mysqli_query($connect,$select);
   
   $row=mysqli_num_rows($query);
   
   //$result=mysqli_fetch_array($query);
   $data='';
   
   $result='';
   
   
    while ($data = mysqli_fetch_array($query) ) {
$plid=$_SESSION['user']['id'];
$more='';
        if ($data['user_id'] === $plid) {
          $more= ' <div class="etc">
            <p class="et" com_id='.$data['id'].'>Edit</p>
            <p class="c-del" com_id='.$data['id'].'>Delete</p>
        </div>';
        }
   
           $result .=' 
           <div>
           <div class="coms">
           <img class="pp-round" src="uploads/'.$data['image'].'">
       <div class="det">
           <p class="cn" >'.$data["name"].' <span class="c-d">23/10/24</spanc></p>
           <p class="c-m" id="com'.$data["id"].'"> '.$data["content"].' </p> 
           
           <p class="repBtn" com_id='.$data['id'].' name='.$data['name'].'>Reply</p>
       '.$more.'
       </div>
       </div>
     '. reply($data["id"]).'
    </div> ' ;
     
        
   
   }
   
   echo  $result;

}


if ($info['type']==="select") {
get();
   }


function reply($id) {
    global $connect;

    
   $select="SELECT * FROM comments WHERE parent_id='$id' ";
   $query=mysqli_query($connect,$select);
   
   $row=mysqli_num_rows($query);

   if ($row===0) {
  
   }else{
    $reply='';
    while ($data=mysqli_fetch_array($query) ) {
        $plid=$_SESSION['user']['id'];
        $more='';
                if ($data['user_id'] === $plid) {
                  $more= ' <div class="etc">
                    <p class="et" com_id='.$data['id'].'>Edit</p>
                    <p class="c-del" com_id='.$data['id'].'>Delete</p>
                </div>';
                }
        $reply .='
        <div>
        <div class="coms shift">
        <img class="pp-round" src="uploads/'.$data['image'].'">
    <div class="det">
        <p class="cn" >'.$data["name"].' <span class="c-d">23/10/24</spanc></p>
        <p class="c-m" id="com'.$data["id"].'">'.$data["content"].' </p>
        <p class="repBtn" com_id='.$data['id'].' name='.$data['name'].'>Reply</p>
    '.$more.'
       
    </div>
    </div>
'. reply($data["id"]).'
    </div> '  ;
    }
    return $reply ;
   }

}



    global $connect,$info;
    if ($info['type']=="update") {

        $content=$info['content'];

        $com_id=$info['com_id'];

        $up="UPDATE comments SET content='$content' WHERE id = '$com_id'";
        $query=mysqli_query($connect,$up);

        if ($query) {
            get();
             }else{
                 echo "something went wrong";
             }
    }



   function del()  {
    global $info ,$connect;

    if ($info['type']==="delete") {
        $id=$info['id'];
        $delete="DELETE FROM comments WHERE id ='$id' OR parent_id ='$id' ";
        $query=mysqli_query($connect,$delete);
    }
   }

   del();