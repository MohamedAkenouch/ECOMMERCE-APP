<?php

session_start();
require_once "config.php";


$contact_id = $_REQUEST["q"];

$query = "DELETE FROM messagerie WHERE id = '$contact_id' ; ";
$res = $link->query($query);

echo "";

?>