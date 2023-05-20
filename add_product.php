<?php
session_start();
require_once "config.php";
$client_id=0;
?>

<?php
$nameErr  = $genderErr = $priceErr =   "";
$name  = $gender = $price = "";
$color = $size = $quantity=array();
$msg = "";
$price_error="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
    $nameErr = "Le nom est requis";
  } else {
    $name = test_input($_POST["name"]);
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["price"])) {
      $priceErr = "Le prix est requis";
    } else {
      if(is_numeric($_POST["price"])){
        $price = test_input($_POST["price"]);
      } else {
        $priceErr = "Vous devez entrer un nombre";
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
    if (empty($_POST["quantity"])) {
      $quantityErr = "La quantité est requise";
    } else {
        $quantity = $_POST["quantity"];
     
     
    }
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["color"])) {
      $colorErr = "La couleur est requise";
    } else {
      $color = $_POST["color"];
    }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["size"])) {
        $sizeErr = "La taille est requise";
      } else {
        $size = $_POST["size"];
      }
      }


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $body = test_input($_POST["body"]);
  }
        





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}






if(isset($_POST["insert"]))  
 {  
         
    if(!empty($name) && !empty($gender) && !empty($price)){


        $sql222 = "SELECT product_name,product_price FROM products WHERE product_name = '$name' AND category = '$gender'";
        $result222 =  mysqli_query($link, $sql222);
        $verify_name="";
        $verify_price=-1;
      
        if (mysqli_num_rows($result222) > 0) {
          while ($row222 = $result222->fetch_assoc()) {
            $verify_price=$row222["product_price"];
            $verify_name=$row222["product_name"];
      
        }}
     

        if(!empty($verify_name) && $price!=$verify_price ){
          $price_error="Le produit existe déjà et le prix non compatible!";
          $error=1;
        }
     




    $image = $_FILES["image"]["name"];
    $image_tmp=$_FILES["image"]["tmp_name"];
    $error=0;
    for ($i = 0; $i < count($color); $i++) {
      for ($j = 0; $j <3; $j++) {
        $quantity[$i][$j][0]= test_input($quantity[$i][$j][0]);
        if(!empty($color[$i][0])){
          if((!empty($size[$i][$j][0]) && empty($quantity[$i][$j][0])) || (empty($size[$i][$j][0]) && !empty($quantity[$i][$j][0]))){
            $error=1;
          }
        } else {
          if(!empty($size[$i][$j][0]) || !empty($quantity[$i][$j][0])){
            $error=1;
          } else {
            if(!is_numeric($quantity[$i][$j][0])){
              $error=1;
            } else {
              
              $col= $color[$i][0];
              if(!empty($size[$i][$j][0])){
              $sz = $size[$i][$j][0];
              }
              $sql = "SELECT product_id FROM products WHERE product_name = '$name' AND category = '$gender' AND product_size = '$sz' AND product_color='$col'";
              $result =  mysqli_query($link, $sql);
              $verify = mysqli_num_rows($result); 
              if(!empty($verify)){
                $error=1;
              } 
            }
          }
        }
      }
    }



    if($error===0){
      for ($i = 0; $i < count($color); $i++) {
        $im="";
        if(!empty($image[$i][0])){
          $im=$image[$i][0];
          $target = "products_images/".basename($im);
          move_uploaded_file($image_tmp[$i][0],$target);  
        }
        for ($j = 0; $j <3; $j++) {
          $col= $color[$i][0];
          $qua = $quantity[$i][$j][0];
          if(!empty($size[$i][$j][0])){
          $sz = $size[$i][$j][0];
          }
          if(!empty($size[$i][$j][0]) && !empty($color[$i][0])){
                $query = "INSERT INTO products(product_name,category,product_price,product_image,product_quantity,product_size,product_color,product_desc)
                VALUES ('$name','$gender','$price','$im','$qua','$sz','$col','$body')";  
                mysqli_query($link, $query);        
              }
        }
        $msg = "Produit ajouté";
      }  
    } else{
      $msg="Propriétés invalides";
    }



     
   
   
   }
 }  

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter produit</title>
    <link rel="stylesheet" href="add_product.css">
    <?php include 'links.php'; ?>


</head>
<body>


<?php 

?>






<?php include 'header.php'; ?>

<form id="connexion_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

  <label for="name">Nom du produit</label><br>
  <input id="inputs" type="text" name="name"  pattern="[A-Za-z0-9].{0,500}" titre="les nombres et les lettres seulement autorisé"><br>
  <div style="color:red;text-align:center"><?php echo $nameErr ?></div><br>
  <p>Genre</p>
  <?php
  $sqln22 = "SELECT DISTINCT category FROM products ; ";
  $resultn22 = mysqli_query($link, $sqln22);
  ?>
  <?php
    if (mysqli_num_rows($resultn22) > 0) {
    while ($rown22 = $resultn22->fetch_assoc()) {
    $cate=$rown22["category"];
  ?>
  <input id="radio" type="radio" name="gender" value="<?php echo $cate ?>">
  <label for="male"><?php echo $cate ?></label>
  <?php
    }}  
  ?>

<div style="color:red;text-align:center"><?php echo $genderErr ?></div><br>

<label for="price">Prix</label><br>
  <input id="inputs" type="text" name="price" pattern="[0-9].{0,500}"><br>
  <div style="color:red;text-align:center"><?php echo $priceErr ?></div><br>
  <div style="color:red;text-align:center"><?php echo $price_error ?></div><br>

<p>Description</p>
<textarea style="margin-bottom:2vw;" rows="4" cols="100" name="body" form="connexion_form"  pattern="[A-Za-z0-9].{0,100000}"></textarea><br> 








<h3>Proprietés</h3>
<div id="cara">

  <div id="col_im">
    <label style="float:left;margin-right:5px;" for="color">Couleur :</label>
    <input style="float:left;width:20%;height:1.5vw;"  type="color"  name="color[0][]">
    <input style="float:right;margin-right:5px;" type="file"  name="image[0][]">
    <label style="float:right;" for="image">Image :</label>
  </div>

<p style="text-align:center;font-size:2vw">SIZE</p> 

  <div class="row">

  <div class="col">
  <label for="S"> S </label>
  <input style="margin-right:20px" type="checkbox"  name="size[0][0][]" value="S">
  <label for="quantity">Quantité</label>
  <input id="quantity" type="text" name="quantity[0][0][]" pattern="[0-9].{0,500}">
  </div>

  <div class="col">
  <label for="M"> M </label>
  <input style="margin-right:20px" type="checkbox"  name="size[0][1][]" value="M">
  <label for="quantity">Quantité</label>
  <input id="quantity" type="text" name="quantity[0][1][]" pattern="[0-9].{0,500}">
  </div>

  <div class="col">
  <label for="L"> L </label>
  <input style="margin-right:20px" type="checkbox" name="size[0][2][]" value="L">
  <label for="quantity">Quantité</label>
  <input id="quantity" type="text" name="quantity[0][2][]" pattern="[0-9].{0,500}">
  </div>

  </div>

  </div>

  

  <div id="1"></div>
  <div style="margin-top:5%;margin-right:10%;margin-bottom:5%">
  <button class="btn btn-secondary" style="float:right;padding: 0% 2vw 0% 2vw;font-size:2vw" type="button" id="more" value="1" onclick="add_info_product(this.value)">+</button><br>
  </div>

  <div style="color:red;text-align:center"><?php echo $msg ?></div><br>
  <input type="submit" value="Ajouter"  name="insert" id="submit"><br>
</form>




<script>
	function add_info_product(number) {
    

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById(number).innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "add_property.php?q="+number, true);
      xhttp.send();
      document.getElementById("more").value = number+1;

  }

</script>















<?php include 'footer.php'; ?>


</body>
</html>
