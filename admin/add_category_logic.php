<?php
    include('../class/connection.php');
    extract($_POST);
    $obj = new Client;
    if($obj->add_category($_POST)) {
        $obj->url("add_category.php?run=success");
    }
?>