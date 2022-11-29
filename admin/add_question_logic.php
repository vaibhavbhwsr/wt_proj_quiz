<?php
    include('../class/connection.php');
    extract($_POST);
    $obj = new Client;
    if($obj->add_question($_POST)) {
        $obj->url("add_question.php?run=success");
    }
?>