<?php
try{
    $con = new PDO("mysql:dbhost=localhost;dbname=aporajnote","root","");
}catch(PDOException $error){
    echo $error->getMessage();
}
?>