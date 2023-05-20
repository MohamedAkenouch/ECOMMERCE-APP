<?php


$colorErr = $sizeErr = "";
$color = $size = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["color"])) {
    $colorErr = "Le nom est requis";
  } else {
    $color = $_POST["color"];
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["size"])) {
    $sizeErr = "Le nom est requis";
  } else {
    $size = test_input($_POST["size"]);
   
  }
}








function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$error_commande="";
if(isset($_POST["insert"]))  
 {
   if(!empty($client_id)){  

  $sql = "SELECT * FROM products WHERE product_name='$product_name' AND category='$category' AND product_color='$color' AND product_size='$size' ";
  $result = mysqli_query($link, $sql);
  
  if (mysqli_num_rows($result) > 0) {
  while ($row = $result->fetch_assoc()) {
    $product_id = $row["product_id"];
   
    $query1 = "SELECT commande_id FROM commandes WHERE fk_client_id = '$client_id' AND fk_product_id = '$product_id' AND stat ='non commander' ";
    $result_query1 = mysqli_query($link, $query1);
    if(empty( $result_query1->fetch_assoc())){
      
      $query2 = "INSERT INTO commandes(fk_client_id,fk_product_id,quantity) VALUES ('$client_id','$product_id',1)";  
      mysqli_query($link, $query2);  
    } else {
      $error_commande = "Déjà commandé";
    }
    
  } 

  } else {
    $error_commande = "Non disponible dans cette taille et couleur";
  }

} else {
  $error_commande = "Vous devez vous connecter";
}
  
 
   

 } 

?>
