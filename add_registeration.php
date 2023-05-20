<?php
session_start();

$client_id=0;

require_once "config.php";
 
$username = $password = $confirm_password =$phone_number=$email= "";
$username_err = $password_err = $confirm_password_err = $phone_number_err=$email_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    if(empty(trim($_POST["nom"]) . " " . trim($_POST["prenom"]))){
        $username_err = "Veuillez entrer un nom d'utilisateur.";
    } else {

        $sql = "SELECT client_id FROM clients WHERE client_name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
     
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["nom"]) . " " . trim($_POST["prenom"]);
            
         
            if(mysqli_stmt_execute($stmt)){
           
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ce nom d'utilisateur est déjà pris.";
                } else{
                    $username = trim($_POST["nom"]) . " " . trim($_POST["prenom"]);
                }
            } else{
                echo "Un problème est survenu. Veuillez réessayer plus tard.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    if(empty(trim($_POST["email"]))){
        $email_err = "Veuillez entrer votre email.";
    } else {

        $sql = "SELECT client_id FROM clients WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
     
            mysqli_stmt_bind_param($stmt, "s", $param_email);
     
            $param_email = trim($_POST["email"]);

            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "Cet email est déjà pris.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Un problème est survenu. Veuillez réessayer plus tard.";
            }

    
            mysqli_stmt_close($stmt);
        }
    }
    

    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez entrer un mot de passe.";     
    } elseif(strlen(trim($_POST["password"])) < 6  ){
        $password_err = "Le mot de passe doit comporter au moins 6 caractères.";
    } else{
        $password = trim($_POST["password"]);
    }
    

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Veuillez confirmer le mot de passe.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Le mot de passe ne correspond pas.";
        }
    }

    if(empty(trim($_POST["phone_number"]))){
        $phone_number_err = "Veuillez entrer votre numéro de téléphone.";     
    } elseif(strlen(trim($_POST["phone_number"])) != 10  ){
        $phone_number_err = "Le numéro de téléphone doit avoir 10 charactères.";
    } else{
        $phone_number = trim($_POST["phone_number"]);
    }
   
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_number_err)){
        

        $sql = "INSERT INTO clients (client_name,email,password,phone_number) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_email, $param_password,$param_phone_number);
            
            $param_username = $username;
            $param_email = $email;
            $param_phone_number=$phone_number;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
         
            if(mysqli_stmt_execute($stmt)){
               
                header("location: login.php");
            } else{
                echo "Un problème est survenu. Veuillez réessayer plus tard.";
            }

            mysqli_stmt_close($stmt);
        }
    }
  
}
?>
 
