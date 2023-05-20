<?php

session_start();
require_once "config.php";


$article_id = $_REQUEST["q"];

    $query = "DELETE FROM articles WHERE article_id ='$article_id' ";
    $res = $link->query($query);




echo "";

?>