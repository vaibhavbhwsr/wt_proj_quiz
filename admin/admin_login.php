<?php
    include("../class/connection.php");
    $obj = new Client;
    extract($_POST);
    if($obj->login($e, $p)) {
        $obj->url('add_question.php');
    }
    else {
        $obj->url('index.php?run=failed');
    }
?>