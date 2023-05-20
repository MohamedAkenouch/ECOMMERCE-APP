<?php

session_start();
require_once "config.php";


$category = $_REQUEST["q"];

    $query = "DELETE FROM products WHERE category ='$category' ";
    $res = $link->query($query);




echo "";

?>