<?php
session_start();
require_once "config.php";
$client_id=0;
if(!empty($_SESSION)){
	$client_id = $_SESSION["client_id"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASHION</title>
    <link rel="stylesheet" href="articles.css">
    <?php include 'links.php';?>
</head>
<body>
<?php include 'header.php';?>
<?php if($client_id === 1){ ?>
    <div style="margin-bottom:5%;margin-top:5%;">
    <a style="margin-left:45%;margin-bottom:50%;" href="add_article.php" class = "text-center"><button type="button" class="btn btn-outline-secondary">Ajouter un article</button></a>
    </div>
    <?php } ?>


 <?php
 $sql = "SELECT * FROM articles ; ";
  $result = mysqli_query($link, $sql);
?>


<div class="fluid-container">
<div class="article_row">

<?php

if (mysqli_num_rows($result) > 0) {
  while ($row = $result->fetch_assoc()) {
  
    $article_id = $row["article_id"];
	$title = $row["article_title"];
	$body = $row["article_body"];
    $image = $row["article_image"];


    ?>
    <div class="article_column" id="<?php echo $article_id."id" ?>">			
        <h2 id="title"><?php echo $title ?></h1>
        <img style="width: 100%;" src="<?php echo $image ?>" alt="">
        <p id="body"><?php echo $body ?></p>
        <?php if($client_id===1){ ?>
        <button style="float:right;" class="btn btn-outline-secondary" value="<?php echo $article_id ?>" onclick="remove_article(this.value)">Supprimer</button>
        <?php  } ?>
        
				
	</div>	
    
		
<?php		
	}}

?>


</div>
</div>






<?php include 'footer.php'; ?>

<script>
	function remove_article(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str+"id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "remove_article.php?q="+str, true);
    xhttp.send();
  }


</script>
</body>
</html>
