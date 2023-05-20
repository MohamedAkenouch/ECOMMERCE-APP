
<?php 
$contact_name=$contact_message=$contact_email=$contact_subject="";
$contact_nameErr=$contact_messageErr=$contact_emailErr=$contact_subjectErr="";
$contact_msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $contact_nameErr = "Le nom est requis";
      } else {
        $contact_name = test_input($_POST["name"]);
      }
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["message"])) {
        $contact_messageErr = "Message est requis";    
    } else {
        $contact_message = test_input($_POST["message"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $contact_emailErr = "L'email est requis";
    } else {
        $contact_email = test_input($_POST["email"]);
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["subject"]==="na") {
        $contact_subjectErr = "Le sujet est requis";
    } else {
        $contact_subject = test_input($_POST["subject"]);
    }
}


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
if(isset($_POST["insert"]))  {  
      if(!empty($contact_name) && !empty($contact_message) && !empty($contact_email) && !empty($contact_subject) ){
    
          $contact_query = "INSERT INTO messagerie(expediteur,message,email,subject)
          VALUES ('$contact_name','$contact_message','$contact_email','$contact_subject')";  
          mysqli_query($link, $contact_query);
          $contact_msg="Message envoyé";
          
      
     }  
}
     
?>
