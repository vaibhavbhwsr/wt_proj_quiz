<?php
    include("class/connection.php");
    $obj = new Client;
    extract($_POST);
    if($obj->login($e, $p)) {
        if ($obj->check_super_user())
            $obj->url('admin/overview.php');
        else
            $obj->url('home.php');
    }
    else {
        $obj->url('index.php?run=failed');
    }

?>