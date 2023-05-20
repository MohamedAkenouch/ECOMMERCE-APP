<?php include 'verify_login.php'; ?>

<!doctype html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
    <?php include 'links.php'; ?>

</head>
<body >
    <?php include 'header.php'; ?>
    
	<form id="connexion_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<input id="inputs" type="email" name="email" placeholder="E-mail" ><br>
        <div style="color:red;text-align:center"><?php echo $email_err ; ?></div><br>
        <input id="inputs" type="password" name="password" placeholder="Mot De Passe" ><br>     
        <div style="color:red;text-align:center"><?php echo $password_err ; ?></div><br>
        <input  type="submit" value="Se connecter" id="submit">
		
	</form>
    <?php include 'footer.php'; ?>

   
</body>
</html>
