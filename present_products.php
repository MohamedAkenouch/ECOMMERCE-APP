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

