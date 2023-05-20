
<?php
$client_id="";
session_start();
require_once "config.php";
if(!empty($_SESSION)){
    $client_id = $_SESSION["client_id"];
}

?>
<?php
$product_desc="";
$product_name = $_GET['product_name'];
$sql1 = "SELECT DISTINCT product_name,product_price,category,product_desc FROM products WHERE product_name = '$product_name' ; ";
$result1 = mysqli_query($link, $sql1);
if (mysqli_num_rows($result1) > 0) {

  while ($row1 = $result1->fetch_assoc()) {
	$category = $row1["category"];
	$product_price = $row1["product_price"];
  $product_desc=$row1["product_desc"];
  }}

$sql2 = "SELECT DISTINCT product_size FROM products WHERE product_name = '$product_name' AND category = '$category' ; ";
$result2 = mysqli_query($link, $sql2);
$sql3 = "SELECT DISTINCT product_color FROM products WHERE product_name = '$product_name' AND category = '$category' ; ";
$result3 = mysqli_query($link, $sql3);
$sql4 = "SELECT DISTINCT product_image FROM products WHERE product_name = '$product_name' AND category = '$category' ; ";
$result4 = mysqli_query($link, $sql4);
$result5 = mysqli_query($link, $sql4);

?>