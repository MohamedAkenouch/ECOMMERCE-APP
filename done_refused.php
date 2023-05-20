
<?php

session_start();
require_once "config.php";

$commande_id = $_REQUEST["q"];

$sql = "UPDATE commandes
SET stat = 'refused and done'
WHERE commande_id = '$commande_id';";
$result = mysqli_query($link, $sql);

echo "";

?>