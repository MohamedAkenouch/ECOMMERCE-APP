<?php
session_start();
require_once "config.php";
$client_id=0;
if(!empty($_SESSION)){
	$client_id = $_SESSION["client_id"];
}

?>
<?php
$category = $_GET['category'];
?>
<!DOCTYPE html>

<html>
<head> 
	<title><?php $category ?></title>
	<link rel="stylesheet" href="category.css">
	<?php include 'links.php'; ?>


</head>
<body>

<?php include 'header.php'; ?>

	<h1 id="category" ><?php $category ?> </h1>
	<h2 id="Servez-vous" ><em>Servez-vous</em></h2><br>
	<?php if($client_id === 1){ ?>
    <a style="margin-left:45%;margin-bottom:50%;" href="add_product.php" class = "text-center"><button type="button" class="btn btn-outline-secondary">Ajouter un produit</button></a>
    <?php }?>

	

	


<?php
 $sql = "SELECT product_name,product_price,product_image FROM products WHERE category = '$category' GROUP BY product_name; ";
  $result = mysqli_query($link, $sql);
?>

<div class="category_row">
<?php
if (mysqli_num_rows($result) > 0) {
 
  while ($row = $result->fetch_assoc()) {
	$product_name = $row["product_name"];
	$product_price = $row["product_price"];
    $product_image = $row["product_image"];
   
	?>

	<div class="category_column" id="<?php echo $product_name."id" ?>">			
		<img src="products_images\<?php echo $product_image ?>" ><br>
		<a id="product_name" href="<?php printf('%s?product_name=%s', 'Product.php',  $product_name); ?>"><p class="bg-dark"><?php echo $product_name ?></p></a><br>
		<p >Prix: <?php echo $product_price ?>$</p>
		<div>
		<?php if($client_id===1){ ?>
		<button style="float:right;margin-top:-20px" class="btn btn-outline-secondary" value="<?php echo $product_name ?>" onclick="remove_product(this.value)">Supprimer</button>
			<?php } echo "" ;?>
		</div>					
	</div>	
		     
		
		
<?php		
	}}

?>


</div>


<?php include 'footer.php'; ?>

<script>
	function remove_product(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str+"id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "remove_product.php?q="+str, true);
    xhttp.send();
  }


</script>
</body>
</html>
