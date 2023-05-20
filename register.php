
<?php include 'add_registeration.php'; ?>
<!doctype html>
<html>
<head>
	<title>inscription</title>
    <link rel="stylesheet" href="register.css">
    <?php include 'links.php'; ?>

</head>
<body class = "inscription">

    <?php include 'header.php'; ?>
	<form id="connexion_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<input type="text" id="inputs" name="nom" placeholder="Nom"><br>
		<input type="text" id="inputs" name="prenom" placeholder="Prénom"><br>
		<div style="color:red;text-align:center"><?php echo $username_err ; ?></div><br>

		<input type="tel"id="inputs" name="phone_number" placeholder="Téléphone"><br>
		<div style="color:red;text-align:center"><?php echo $phone_number_err  ; ?></div><br>

		<input type="email" id="inputs" name="email" placeholder="E-mail " required><br>
		<div style="color:red;text-align:center"><?php echo $email_err ; ?></div><br>

		<input type="password" id="inputs" name="password" placeholder="Mot De Passe " pattern=(?=.*\d).{6,8} required><br>
		<div style="color:red;text-align:center"><?php echo $password_err  ; ?></div><br>

        <input type="password" id="inputs" name="confirm_password" placeholder="Confirmation De Mot De Passe"required><br>		
		<div style="color:red;text-align:center"><?php echo  $confirm_password_err ; ?></div><br>

        <input type="submit" class="btn btn-primary" value="Soumettre" id="submit">
        <input type="reset" class="btn btn-default" value="Réinitialiser" id="submit">
		
		
	</form>
    <?php include 'footer.php'; ?>
	
</body>
</html>
