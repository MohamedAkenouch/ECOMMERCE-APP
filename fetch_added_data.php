<?php
session_start();
require_once "config.php";
$client_id=0;
?>

<?php
$nameErr = $quantityErr = $genderErr = $priceErr = $colorErr = $sizeErr =  "";
$name = $quantity = $gender = $price = $color = $size =  "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
    $nameErr = "Le nom est requis";
  } else {
    $name = test_input($_POST["name"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["quantity"])) {
    $quantityErr = "La quantité est requise";
  } else {
    if(is_numeric($_POST["quantity"])){
      $quantity = test_input($_POST["quantity"]);
    } else {
      $quantityErr = "Veuillez entrer un nombre";
    }
   
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["price"])) {
      $priceErr = "Le prix est requis";
    } else {
      if(is_numeric($_POST["price"])){
        $price = test_input($_POST["price"]);
      } else {
        $priceErr = "Veuillez entrer un nombre";
      }
     
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["gender"])) {
    $genderErr = "Le genre est requis";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["color"])) {
      $colorErr = "La couleur est requise";
    } else {
      $color = test_input($_POST["color"]);
    }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["size"])) {
        $sizeErr = "La taille est requise";
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
if(isset($_POST["insert"]))  
 {  
  

  $target = "products_images/".basename($_FILES["image"]["name"]);

  $image = $_FILES["image"]["name"];


   if(!empty($name) && !empty($gender) && !empty($quantity) && !empty($image) && !empty($price) && !empty($size) && !empty($color)){
    $sql = "SELECT product_id FROM products WHERE product_name = '$name' AND category = '$gender' AND product_size = '$size' AND product_color='$color'";
    $result =  mysqli_query($link, $sql);
    $verify = mysqli_num_rows($result);
     if(empty($verify)){
      $query = "INSERT INTO products(product_name,category,product_price,product_image,product_quantity,product_size,product_color)
      VALUES ('$name','$gender','$price','$image','$quantity','$size','$color')";  
      mysqli_query($link, $query);
  
      if(move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
        $msg = "Produit ajouté";
      }
      else{
      $msg = "Un problème est survenu. Veuillez réessayer";
      }      

     } else {
       $msg = "Ce produit existe déjà";
     }

   
   
   
   }
      
 }  

?>

