<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
<a href="acceuil.php"><button type="button" onclick="deconnecter()" class="btn btn-light">Se déconnecter</button></a>

</body>
</html>


<script>
function deconnecter() {
 <?php
  session_start();
  session_unset();
  header("location: acceuil.php");
?>
}
</script>
