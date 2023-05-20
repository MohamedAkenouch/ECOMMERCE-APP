<?php

session_start();
require_once "config.php";


$product_id = $_REQUEST["q"];

    $query = "DELETE FROM products WHERE product_id ='$product_id' ";
    $res = $link->query($query);




echo "";

?>