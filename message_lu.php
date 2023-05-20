
<?php

session_start();
require_once "config.php";

$contact_id = $_REQUEST["q"];


$sql = "UPDATE messagerie
SET etat = 'Message est Lu'
WHERE id = '$contact_id';";
$result = mysqli_query($link, $sql);

echo "Message est Lu";


?>