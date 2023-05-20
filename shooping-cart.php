<?php

session_start();
require_once "config.php";
$client_id="";
if(!empty($_SESSION)){
  $client_id = $_SESSION["client_id"];
} 

$sql = "SELECT commande_id,product_id,product_name,product_price,category,product_image,product_color,product_size,quantity,stat,product_quantity
        FROM products,commandes WHERE products.product_id = commandes.fk_product_id
        AND fk_client_id ='$client_id' AND NOT stat = 'validate and done' AND NOT stat = 'refused and done' ";
$result = mysqli_query($link, $sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta  name=" viewport" charset="utf-8" content="width=device-width" initiale-scale=1.0>
    <title>Panier -ASEDS SHOP| Ecommerce Website</title>
    <link rel="stylesheet" href="shooping-cart.css">
    <?php include 'links.php'; ?>
   
</head>

<body>
  <?php include 'header.php'; ?>

 
    <?php
    if(!empty($_SESSION)){
        include 'client_cart.php';
    } else{ 
      ?>
      <h1 style="margin-top:20%;margin-bottom:20%;text-align:center;color:red;font-size:300%">Connectez-vous ou inscrivez-vous pour accéder au panier</h1>
      <?php
      
    }
    ?>
        </div>
    </div>
 


    <?php include 'footer.php'; ?>

<script>
function commande(str) {
  var d = document.getElementById(str+"id2");
  var display = d.options[d.selectedIndex].text;
 
 var resultat = str+"."+display+"."+<?php echo $x ?>;
 
  var xhttp = new XMLHttpRequest();
	
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(str+"id").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "commande.php?q="+resultat, true);
  xhttp.send();
}


function done_validate(str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(str+"id").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "done_validate.php?q="+str, true);
  xhttp.send();
}
function done_refused(str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(str+"id").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "done_validate.php?q="+str, true);
  xhttp.send();
}




function remove_commande(str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(str+"id").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "remove_commande.php?q="+str, true);
  xhttp.send();
}

</script>

</body>
</html>    
