<?php

session_start();
require_once "config.php";


$client_id = $_REQUEST["q"];

    $query = "DELETE FROM clients WHERE client_id ='$client_id' ";
    $res = $link->query($query);




echo "";

?>