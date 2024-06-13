<?php
require_once("../config.php");

$frontend=json_decode(file_get_contents('php://input'),true);

$value=$frontend['val'];

if (empty($value)) {
 
}else{
$select ="SELECT title,id FROM post WHERE title LIKE '%$value%' " ;
$query=mysqli_query($connect,$select);
$row=mysqli_num_rows($query);
$red='';
if ($row !== 0) {
    while ($data=mysqli_fetch_assoc($query)) {
        $red.='<p class="til"><a href="ind.php?id='.$data['id'].'" class="ty">'.$data['title'].'</a></p>';
        }
}else{
    $select ="SELECT title,id FROM post ORDER BY num_comment DESC LIMIT 5" ;
$query=mysqli_query($connect,$select);



while ($data=mysqli_fetch_assoc($query)) {

    $red.='<p class="til"><a href="ind.php?id='.$data['id'].'" class="ty">'.$data['title'].'</a></p>';

    }


}

echo $red;
}



