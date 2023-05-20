<?php
session_start();
require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATION</title>
    <link rel="stylesheet" href="administration.css">
    <?php include 'links.php';?>
  
</head>
<body>
    <?php include 'header.php';?>
    
<div class = "fluid-container background-h2">
<h2>Tableau de bord</h2>
</div>
<div class="fluid-container" style="  background-color: white;">
  <div class="row">
  <div class="col">
  <div id="total_incomes_style">
    <p class="bord">Revenu total</p>
    <p class="bord1" id="total_incomes" ></p>
  </div>
  <div id="users_style">
    <p class="bord" >Nombre total d'utilisateurs</p>
    <p class="bord1" id="users"><p>
  </div>
  <div id="commandes_style">
    <p class="bord" >Commandes</p>
    <p class="bord1" id="commandes"></p>
  </div>
  </div>
  <div class="col statistic">
    <div id="cart"></div>
    <div id="2"></div>
  </div>
  <div class="col">
    <div id="3"></div>
  </div>
    
  </div>
</div>
<div class=" fluid-container">
  <div id="sales by year"></div>
</div>

      <?php include 'administration_category.php';?>  
      <?php include 'commandes_table.php';?>
      <?php include 'administration_contact_us.php';?>  
      <?php include 'users_table.php';?>
      <?php include 'dashboard_table.php';?>
     

   





      <?php include 'footer.php'; ?>


<script>
  
function valider(str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(str).innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "validate.php?q="+str, true);
  xhttp.send();
}




function refuse(str) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(str).innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "refused.php?q="+str, true);
  xhttp.send();
}


</script>

</body>
</html>
