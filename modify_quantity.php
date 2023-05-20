
<?php

session_start();
require_once "config.php";

$h = $_REQUEST["q"];
$h2= explode(".", $h);
$product_id=$h2[0];
$product_quantity=$h2[1];

$sql = "UPDATE products
SET product_quantity = '$product_quantity'
WHERE product_id = '$product_id';";


$result = mysqli_query($link, $sql);


?>
<?php echo $product_quantity ?>