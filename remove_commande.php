<?php

session_start();
require_once "config.php";


$commande_id = $_REQUEST["q"];

    $query = "DELETE FROM commandes WHERE commande_id ='$commande_id' ";
    $res = $link->query($query);




echo "";

?>