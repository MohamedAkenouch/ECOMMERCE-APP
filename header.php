<?php
if(!empty($_SESSION)){
$client_id=$_SESSION["client_id"];
}
?>
<?php
$username="";
if(!empty($_SESSION)){
 $sqln = "SELECT * FROM clients WHERE client_id='$client_id' ; ";
  $resultn = mysqli_query($link, $sqln);
  if (mysqli_num_rows($resultn) > 0) {
    while ($rown = $resultn->fetch_assoc()) {
      $username=$rown["client_name"];
    }}}  
?>

<?php

$sqln2 = "SELECT DISTINCT category FROM products ; ";
$resultn2 = mysqli_query($link, $sqln2);

?>


<link rel="stylesheet" href="header.css">
        <header>
    
                <form  method="GET">
                    <img style="width:10%; height:5%;margin-left:2%" src="aseds.jpg"  onMouseOver="afficher('Bienvenue !')" id="logo" alt="header_logo"> 
                    
                    <?php include 'search_bar.php'; ?>
              
                <?php if(!empty($_SESSION)){ ?>
                    <a href="deconnecter.php"><button type="button" value="deconnected" id="deconnecter" class="btn btn-light">Se déconnecter</button></a>
                    <a href="profil.php" class="btn btn-secondary btn-lg" ><?php echo $username?></a>
                <?php } else {?>
                    <a href="login.php" ><button type="button" id="connecter" class="btn btn-light"  >Se connecter</button></a>
                    <a href="register.php"><button type="button" id="creer" class="btn btn-light">Créer un compte</button></a>

                <?php }?>
                <?php if($client_id!=1){ ?>
                  <a href="shooping-cart.php"><i class="bi bi-cart4"></i><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                  </svg></a>
                  <?php }?>
                  
                </form>
                    
       </header>
       <hr>
    
        <nav id="header_nav" class="  navbar navbar-expand-md navbar-light font-weight-bold text-upper-case px-5" >
            <div class="container-fluid">
              
              <ul class="nav navbar-nav">
                <li class="nav-item"> <a class="nav-link" href="acceuil.php"><i class="bi bi-house-door-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                  </svg>Accueil</a></li>
                  <?php
                    if (mysqli_num_rows($resultn2) > 0) {
                    while ($rown2 = $resultn2->fetch_assoc()) {
                      $product_category=$rown2["category"];
                  ?>
                <li  class="nav-item"><a class="nav-link" href="<?php printf('%s?category=%s', 'category.php',  $product_category); ?>"><?php echo $product_category ?></a></li>
                <?php
                  }}  
                ?>
                <?php if($client_id ===1){ ?>
                <li  class="nav-item"><a class="nav-link" href="administration.php">Administration</a></li>
                <?php } ?>

                 <li class="nav-item"> <a class="nav-link" href="contact_us.php"><i class="bi bi-chat-fill"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
                  </svg>        Contacts          </a>
                  <li class="nav-item"> <a class="nav-link" href="articles.php">        Fashion          </a></li>
                  
                </ul>
            </div>
        </nav>
        
 
