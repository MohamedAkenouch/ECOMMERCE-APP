<?php
session_start();
require_once "config.php";
 ?>


<?php

$sqln2 = "SELECT DISTINCT category FROM products ; ";
$resultn2 = mysqli_query($link, $sqln2);

?>
<?php
 $sqli = "SELECT product_name,product_price,product_image FROM products GROUP BY product_name  ; ";
 $resulti = mysqli_query($link, $sqli);
?>
 <?php
    if (mysqli_num_rows($resultn2) > 0) {
        while ($rown2 = $resultn2->fetch_assoc()) {
            $product_category=$rown2["category"];
            $b[] = $product_category;          
    }}  
?>
<?php

if (mysqli_num_rows($resulti) > 0) {
  while ($rowi = $resulti->fetch_assoc()) {
	$product_name = $rowi["product_name"];
	$product_price = $rowi["product_price"];
    $product_image = $rowi["product_image"];
    $a[] =$product_name.";".$product_image ;

  }}
	?>
<?php
// Array with names



// get the q parameter from URL
$q = $_REQUEST["q"];

$hint2=array();
$hint1 =array();


// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
 
  foreach($a as  $name) {
    if (stristr($q, substr($name, 0, $len))) {
        $hint1[] = $name;
    }
  }
  
  foreach($b as  $name) {
    if (stristr($q, substr($name, 0, $len))) {
        $hint2[] = $name;
    }
  }
}

?>
<?php
foreach($hint2 as  $name) {
?>
<a href="<?php printf('%s?category=%s', 'category.php',  $name ); ?>"><?php echo $name ?></a>
<?php    
    }
?>

<?php
foreach($hint1 as  $name) {
    $namee = explode(";",$name);
?>
<img style="float:left;width: 5%;height: 6%;" src="products_images\<?php echo $namee[1] ?>" >
<a href="<?php printf('%s?product_name=%s', 'Product.php',  $namee[0]); ?>"><?php echo $namee[0] ?></a>
<?php    
    }
?>



