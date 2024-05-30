<?php


if (isset($_POST['post'])) {
    echo "hello";
}





function strip($val) {
    return htmlentities(strip_tags($val));
}
?>