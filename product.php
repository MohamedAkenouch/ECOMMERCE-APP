<?php include 'fetch_product_elements.php'; ?>

<?php include 'add_commande_to_database.php';?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $product_name ?></title>
        <link rel="stylesheet" href="product.css">
        <?php include 'links.php';?>
    </head>
    <body>
      <?php include 'header.php';?>
      <?php include 'product_info.php'; ?>

      <?php 
      if($client_id===1){
        include 'modify_product.php'; 
      }
      ?>



      <?php include 'footer.php'; ?>

<script>


var slideIndex = 1;
  showSlides(slideIndex);
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
 
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
</script>

    <script src="scripts.js"></script>

    </body>
</html>
