<?php 
session_start();
require_once "config.php";

try{
    $pdo=new PDO('mysql:host=localhost;port=3306;dbname=shop','root' ,'');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch (PDOException $e){
    echo "Connection échouée".$e->getMessage();
  }


$name='';
$email='';
$telephone='';
$password='';
$id=$_SESSION['client_id'];

 


$statement=$pdo->prepare("select * from clients where client_id=:id");
$statement->bindValue(':id',$id);
$statement->execute();
$client=$statement->fetch(PDO::FETCH_ASSOC); 

$name=$client['client_name'];
$email=$client['email'];
$telephone=$client['phone_number'];
$password=$client['password'];
$error0;
$error1;
$error2;
$error3;
$error4;
if ($_SERVER['REQUEST_METHOD']==='POST'){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $telephone=$_POST['telephone'];
  $pswrdAct=$_POST['pswrdAct'];
  $newPswrd=$_POST['newPswrd'];
  $confPswrd=$_POST['confPswrd'];
  if (!$email){
    $error0=" Le champs email est obligatoire";
  }
  if($pswrdAct){
    if($pswrdAct!=$password){
      $error1="le mot de passe est incorrect";
    }
    if(!$newPswrd){
      $error2="veuillez entrer nouveau un mot de passe";
    }
    if($newPswrd){
      if(!isPassword($newPswrd)){
        $error3="mot de passe invalide";
      } else{
        if ($newPswrd!=$confPswrd){
        $error4="Les mots de passe ne correspondent pas";
      }
    }
      

    } 
  
      
  }
  if(!isset($error0)&&!isset($error1)&&!isset($error2)&&!isset($error3) &&!isset($error4)){
    $update=$pdo->prepare("UPDATE clients SET client_id =:client_id , client_name =:client_name , phone_number=:phone_number,email=:email , password=:password WHERE client_id=:client_id;" );
    $update->bindValue(':client_name',$name);
    $update->bindValue(':phone_number',$telephone);
    $update->bindValue(':email',$email);
    $update->bindValue(':client_id',$id);
    if($newPswrd){
      $update->bindValue(':password',$newPswrd);
    }else{
      $update->bindValue(':password',$password);
    }
    
    $update->execute();
    include_once "modifenregistree.php";
    
  }
 
}
function isPassword($password){
  $str='abcdefghijklmnopqrstuvwxyz';
  $char=false;
  $num=false;
  $length=false;
  if ((strlen($password)>=6) ||(strlen($password)<=8) ){
      for($i=0; $i<strlen($password);$i++){
          for($j=0; $j<strlen($str);$j++){
            if($password[$i]===$str[$j] || $password[$i]===strtoupper($str[$j])){
              $char=true;
              break;
            }
          }
        }
        for($i=0; $i<strlen($password);$i++){
          for($j=0; $j<10;$j++){
            if($password[$i]==$j){
              $num=true;
              break;
            }
            
          }
        }
        return($char && $num);
  }
  else{
      return false;
  }
  
}

 
?>

<!doctype html>
<html >
  <head>

    <link rel='stylesheet' href='profil.css'>
    <title>Mon Profil</title>
    <?php include 'links.php'; ?>
  </head>

  <body>
    <?php include 'header.php'; ?>

  <div class="body-profil">
        <h2 style="text-align:center;">Mon profil </h2>
        <br>
        <?php if(isset($error0) || isset($error1) || isset($error2) ||isset($error3)  || isset($error4)){?>
          <div class="alert alert-danger">
             <?php echo "Modifications non enregistrées" ?>
          </div>
        <?php }?>
        
        
       <form action="" method="post" class="profil">
     

       
       
        <div class="mb-3"  >
            <label  class="form-label">Nom</label>
            <input type="text" class="form-control" name='name' value="<?php echo $name ?>" >
            
            
            
        </div>
        <div class="mb-3" >
            <label  class="form-label">Téléphone</label>
            <input type="number" class="form-control" name='telephone' value="<?php echo $telephone ?>" >
            
        </div>
        <div class="mb-3">
            <label  class="form-label">E-mail</label>
            <input type="email" class="form-control" name='email' value="<?php echo $email ?>" >
           
        </div>
        <?php if (isset($error0)){?>
          <div class="alert alert-danger">
             <?php echo $error0 ?>
          </div>
        <?php }?>
          
        <br>
        <div class="d-grid gap-2">
        <button type="button" class="btn btn-outline-warning " onclick="update_password()" >modifier le mot de passe</button>
        </div>
        
        <br>
       
       <div id="update_password"  style="display:none">
                <div class="mb-3">
                    <label  class="form-label">Mot de passe actuel</label>
                    <input type="password" class="form-control" name="pswrdAct"  >
                  
                </div>
                 <?php if (isset($error1)){?>
                  <div class="alert alert-danger" >
                    <?php echo $error1 ?>
                    </div>
                    
                    <?php }?>
                  
                <div class="mb-3">
                    <label  class="form-label">Nouveau mot de passe </label>
                    <input type="password" class="form-control"  name="newPswrd">
                  
                </div>
                 <?php if (isset($error2)){?>
                 <div class="alert alert-danger" >
                <?php echo $error2 ?>
                  </div>
                 <?php } else {
                   if (isset($error3)){?>
                  <div class="alert alert-danger" >
                  <?php echo $error3 ?>
                  </div>
                  <?php }}?> 
                 
                     
                
                <div class="mb-3">
                    <label  class="form-label">Confirmation du mot de passe</label>
                    <input type="password" class="form-control" name="confPswrd" >
                  
                </div>
                    <?php if (isset($error4)){?>
                    <div class="alert alert-danger" >
                      <?php echo $error4 ?>
                      </div>
                      <?php }?>
                    </div>  
                    
       </div>
       <br>   
        <div> 
        <p style="text-align:center;"><button  type="submit" class="btn btn-primary">Enregistrer les modifications</button></p>
        </div>
        
       
        <script src="profil.js"></script>
       
        </form>
 </div>
 <?php include 'footer.php'; ?>

     
        

    
  </body>
</html>

