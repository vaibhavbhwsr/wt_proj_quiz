<?php
    include("class/connection.php");
    $obj = new Client;
    extract($_POST);
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    move_uploaded_file($tmp_name, "img/$img_name");
    $query = "INSERT INTO `users`(`name`, `email`, `password`, `image`) VALUES ('$n','$e','$p','$img_name');";
    if($obj->signup($query)) {
        $obj->url("index.php?run=success");
    }
?>
