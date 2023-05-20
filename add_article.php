<?php
session_start();
require_once "config.php";

?>
<?php
$bodyErr = $titleErr =  "";
$body = $title =  "";
$image = "" ;
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["title"])) {
    $titleErr = "Le titre est requis";
  } else {
    $title = test_input($_POST["title"]);
  }
}


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["body"])) {
    $bodyErr = "Article est requis";
  } else {
    $body = test_input($_POST["body"]);
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

  $target = "articles_images/".basename($_FILES["image"]["name"]);
  $image = $_FILES["image"]["name"];


   if(!empty($title) && !empty($body)){
    $sql = "SELECT article_id FROM articles WHERE article_title = '$title' AND article_body = '$body'";
    $result =  mysqli_query($link, $sql);
    $verify = mysqli_num_rows($result);
     if(empty($verify)){
      $query = "INSERT INTO articles(article_title,article_body,article_image)
      VALUES ('$title','$body','$image')";  
      mysqli_query($link, $query);
  
      if(move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
        $msg = "Article ajouté";
      }
      else{
      $msg = "Une erreur s'est produite. Veuillez réessayer";
      }      

     } else {
       $msg = "L'article existe déjà";
     }
   
    }
      
 }  

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASHION</title>    
    <link rel="stylesheet" href="add_article.css">
    <?php include 'links.php';?>
</head>
<body>

<?php include 'header.php';?>

    <form id="connexion_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
		    <input id="title" type="text" name="title" placeholder="Titre"  pattern="[A-Za-z0-9].{0,500}"><br>
        <div style="color:red;text-align:center"><?php echo $titleErr ; ?></div><br>
        <textarea id="body" rows="4" cols="50" name="body" form="connexion_form" placeholder="Article" pattern="[A-Za-z0-9].{0,100000}"></textarea><br> 
        <div style="color:red;text-align:center"><?php echo $bodyErr ; ?></div><br>

        <label style="margin-top:5%;color:white;font-size:1.5vw;" for="image" >product image</label>
        <input style="float:right;margin-top:5%;" type="file"  name="image"><br>
        
        <p style="color:red;margin-top:5%;" ><?php echo $msg ?></p><br>
        <input  type="submit" value="Ajouter" id="submit" name="insert">
		
    </form>
<?php include 'footer.php'; ?>
</body>
</html>
