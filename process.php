<?php
require("config.php");
$title = $_POST['title'];
$description =  $_POST['description'];
$postId = $_POST['postId'];

if($postId != ''){
    //Update the database
    $update = $con->prepare("UPDATE notebook SET title = ?, description = ? WHERE post_id = ?");
    $update -> execute(array($title,$description,$postId));
}else{
    // insert into the database
    $insert = $con->prepare("INSERT INTO notebook(title,description,status) VALUES(?,?,?)");
    $insert -> execute(array($title,$description,'draft'));
    echo $insert;
}

?>