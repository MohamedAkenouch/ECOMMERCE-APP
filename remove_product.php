<?php

session_start();
require_once "config.php";


$product_name = $_REQUEST["q"];

    $query = "DELETE FROM products WHERE product_name ='$product_name' ";
    $res = $link->query($query);




echo "";

?>