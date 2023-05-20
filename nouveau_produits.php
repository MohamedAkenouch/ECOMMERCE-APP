<?php
 $sqli = "SELECT product_name,product_price,product_image FROM products GROUP BY product_name ORDER BY product_date DESC ; ";
 $resulti = mysqli_query($link, $sqli);
?>
<style>
body{
    background: url(gray.jpg);
    background-size: cover;
}


#category{ color:grey; font-size:100px;text-align: center; text-shadow: 8px 8px lightslategray;margin-top:5%;}
#Servez-vous{ color:grey; font-size:50px;text-align: center; text-shadow: 4px 4px lightslategray;}
	#product_name{
		text-decoration: none; 
	 }
	#product_name p {
		text-align: center;
		color:white;
		border-radius:10px; 
		margin-top:1vw;
		margin-bottom:0.1vw;
		padding:1vw;

	}
	p {
		font-size:150%
	}



	.category_row > .category_column {
  	padding: 0 0;
	}

	.category_row:after {
  	content: "";
  	display: table;
  	clear: both;
	}	

	.category_column {
 	float: left;
  	width: 20%;
	   margin-left : 10%;
	   margin-bottom : 5%;
	}
	.category_column img {
		width: 100%;
		height: 400px;
		
	}



</style>
<div class="category_row">

<?php
$i=0;
if (mysqli_num_rows($resulti) > 0) {
  while ($rowi = $resulti->fetch_assoc()) {
    $i+=1;
    if($i==4){
        break;
    }
	$product_name = $rowi["product_name"];
	$product_price = $rowi["product_price"];
    $product_image = $rowi["product_image"];
   
	?>

	<div class="category_column" id="<?php echo $product_name."id" ?>">			
		<img src="products_images\<?php echo $product_image ?>" ><br>
		<a id="product_name" href="<?php printf('%s?product_name=%s', 'Product.php',  $product_name); ?>"><p class="bg-dark"><?php echo $product_name ?></p></a><br>
		<p  style="width: 30%;" >Prix: <?php echo $product_price ?>$</p>
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
