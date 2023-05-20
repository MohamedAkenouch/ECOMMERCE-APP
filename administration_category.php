
<?php
$nameeErr = $quantityeErr = $gendereErr = $priceeErr = $coloreErr = $sizeeErr =  "";
$namee = $quantitye = $gendere = $pricee = $colore = $sizee =  "";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["name"])) {
    $nameeErr = "Le nom est requis.";
  } else {
    $namee = test_input($_POST["name"]);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["quantity"])) {
    $quantityeErr = "La quantité est requise.";
  } else {
    if(is_numeric($_POST["quantity"])){
      $quantitye = test_input($_POST["quantity"]);
    } else {
      $quantityErre = "Veuillez entrer un nombre.";
    }
   
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["price"])) {
      $priceErre = "Le prix est requis.";
    } else {
      if(is_numeric($_POST["price"])){
        $pricee = test_input($_POST["price"]);
      } else {
        $priceeErr = "Veuillez entrer un nombre.";
      }
     
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["gender"])) {
    $gendereErr = "Le genre est requis.";
  } else {
    $gendere = test_input($_POST["gender"]);
  }
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["color"])) {
      $coloreErr = "La couleur est requise.";
    } else {
      $colore = test_input($_POST["color"]);
    }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["size"])) {
        $sizeeErr = "La taille est requise.";
      } else {
        $sizee = test_input($_POST["size"]);
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
  

  $targete = "products_images/".basename($_FILES["image"]["name"]);

  $imagee = $_FILES["image"]["name"];


   if(!empty($namee) && !empty($gendere) && !empty($quantitye) && !empty($imagee) && !empty($pricee) && !empty($sizee) && !empty($colore)){
    $sqle = "SELECT product_id FROM products WHERE product_name = '$namee' AND category = '$gendere' AND product_size = '$sizee' AND product_color='$colore'";
    $resulte =  mysqli_query($link, $sqle);
    $verifye = mysqli_num_rows($resulte);
     if(empty($verifye)){
      $querye = "INSERT INTO products(product_name,category,product_price,product_image,product_quantity,product_size,product_color)
      VALUES ('$namee','$gendere','$pricee','$imagee','$quantitye','$sizee','$colore')";  
      mysqli_query($link, $querye);
  
      if(move_uploaded_file($_FILES["image"]["tmp_name"],$targete)){
        $msg = "Produit ajouté";
      }
      else{
      $msg = "Un problème est survenu. Veuillez réessayer.";
      }      

     } else {
       $msg = "Ce produit existe déjà.";
     }

   
   
   
   }
      
 }  

?>



<div class = "fluid-container background-h2">
<div style="margin-top:5px;">
<h2>Catégories</h2>
</div>
</div>
<style>
#connexion_form{
    background :black;
        opacity: 60%;
        border-radius: 40px;
        margin-left: 30% ;
        margin-right:30% ;
        margin-top:10%;
        margin-bottom:10%;
        padding:12px;
        height:auto;
        
        text-align: center;
        position: relative;
}
#inputs{
    width: 80%;
    height: 3vw;
    outline:none;
    background-color: transparent;
    color:#fff;
    border: none;
    border-bottom: 1px solid #fff;
    text-align: center;
    font-size: medium;
}
#color{
    width: 40%;
    height: 3vw;
   



}
#radio{
  width: 10%;
  height: 2vw;
  
}
label,p{
  color:white;
  font-size:150%;
  font-family: "Times New Roman", Times, serif;

}
#submit{
    width: 20PX;
    height: 40px;
    color:#fff;
    background-color: transparent;
    width:30mm;
    cursor:pointer;
    border-radius:12px;
    
}

</style>
<?php
$sqla = "SELECT DISTINCT category FROM products ; ";
$resulta = mysqli_query($link, $sqla);
?>
<div class="container" style="margin-top:3%;margin-bottom:3%">
<?php
    if (mysqli_num_rows($resulta) > 0) {
    while ($rowa = $resulta->fetch_assoc()) {
          $category=$rowa["category"];
    ?>
    <div style="margin-top:3%;margin-bottom:3%;margin-left:25%;margin-right:25%;font-size:200%;" id="<?php echo $category."id" ?>">
    <?php echo $category ?>
    <button style="float:right;" class="btn btn-outline-secondary" value="<?php echo $category ?>" onclick="remove_category(this.value)">Supprimer</button>
    </div>
<?php
  }}  
?>

<div id="later" style="margin:10%">
  <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<input style="margin-top:3%;margin-bottom:1%;margin-left:30%;margin-right:30%;width: 40%;" id="new_category" type="text" placeholder="Catégorie" ><br>
	</form>
  <button style="margin-left:30%;margin-right:30%;float:right;padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;"  onclick="add_category()" >Ajouter une catégorie</button>
</div>

  <div id="category_info" >
  <button style="margin-left:30%;margin-right:30%;float:right;padding-left:15px;padding-right:15px;padding-top:10px;padding-bottom:10px;"  onclick="later()" >Plus tard</button>

  <form id="connexion_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

  <label for="name">Nom du produit</label><br>
  <input id="inputs" type="text" name="name"><br>
  <div style="color:red;text-align:center"><?php echo $nameeErr ?></div><br>

  <label for="quantity">Quantité</label><br>
  <input id="inputs" type="text" name="quantity"><br>
  <div style="color:red;text-align:center"><?php  echo $quantityeErr ?></div><br>

  <label for="price">Prix</label><br>
  <input id="inputs" type="text" name="price"><br>
  <div style="color:red;text-align:center"><?php echo $priceeErr ?></div><br>

  <p>Catégorie</p>
  <input id="radio" type="radio"  name="gender" checked>
  <label id="category_in" for="male" ></label>

  <p>Taille</p> 
  <input id="radio" type="radio"  name="size" value="S">
  <label for="S"> S </label>
  <input id="radio" type="radio"  name="size" value="M">
  <label for="M"> M </label>
  <input id="radio" type="radio" name="size" value="L">
  <label for="L"> L </label><br>
  <div style="color:red;text-align:center"><?php echo $sizeeErr ?></div><br>

  <label for="color">Couleur</label><br>
  <input id="color" type="color"  name="color"><br>
  <div style="color:red;text-align:center"><?php echo $coloreErr ?></div><br>


  <label for="image">Image du produit</label>
  <input style="float:right;" type="file"  name="image"><br>

  <div style="color:red;text-align:center"><?php echo $msg ?></div><br>


  <input type="submit" value="Ajouter produit"  name="insert" id="submit"><br>


</form>
  
  </div>
    
</div>
<script>
document.getElementById("category_info").style.display = "none";

function add_category() {

  document.getElementById("category_in").innerHTML=document.getElementById("new_category").value;
  document.getElementById("radio").value = document.getElementById("new_category").value;
  document.getElementById("later").style.display = "none";
  document.getElementById("category_info").style.display = "initial";
}
function later() {
  document.getElementById("category_info").style.display = "none";
  document.getElementById("later").style.display = "initial";
}
</script>
<script>
	function remove_category(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str+"id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "remove_category.php?q="+str, true);
    xhttp.send();
  }
</script>
