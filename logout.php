<?php
    include("class/connection.php");
    $obj = new Client;
    if($obj->logout()) {
        $obj->url('index.php');
    }
?>