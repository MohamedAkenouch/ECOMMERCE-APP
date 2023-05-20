<?php
require_once "config.php";
session_start();
$client_id=0;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
        <title>G6-commerce</title>
        <link rel="stylesheet" href="acceuil.css" />
        <?php include 'links.php'; ?>
    </head>
    <body>

    <?php include 'header.php'; ?>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <a href="femme.php"><img  style="height:100%;"  src="1.jpg" class="d-block w-100" alt="robe"></a>
              </div>
              <div class="carousel-item">
                <a href="homme.php"><img  style="height:100%;"  src="3.jpg" class="d-block w-100" alt="t-chirt"></a>
              </div>
              <div class="carousel-item">
                <a href="femme.php" ><img  style="height:100%;"  src="2.jpg" class="d-block w-100" alt="pontalon"></a>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>

          <div>
              <hr>
              <div style="background-color: grey;" class="fluid-container">
              <h2 style="margin-left:10vw" >Nouveaux Produits♥♥♥</h2>
              </div>
              
              <?php include 'nouveau_produits.php'; ?>

              <div style="background-color: grey;" class="fluid-container">
              <h2 style="margin-left:10vw" class="fluid-container"> FASHION♥♥♥ </h2>
              </div>
              <?php include 'nouveau_articles.php'; ?>

              <footer class="container-fluid">
                <div class="jumbotron jumbotron-sm">
                  <div class="container">
                      <div class="row">
                          <div class="col-sm-12 col-lg-12">
                              <h1 class="h1">
                                  Contactez-nous <small>Soyez les bienvenus</small></h1>
                          </div>
                      </div>
                  </div>
              </div>
            
            <?php include 'fetch_contact_data.php';?>
            <?php include 'contact_form.php';?>            
            <?php include 'footer.php'; ?>

    <script src="acceuil.js"></script>    

    </body>
</html>
