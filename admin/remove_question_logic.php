<?php
    include("../class/connection.php");
    $obj = new Client;
    $obj->admin_authenticate();
    extract($_POST);
    if($obj->remove_question($question_id)){
        $obj->url('./remove_question.php?run=success');
    }
?>