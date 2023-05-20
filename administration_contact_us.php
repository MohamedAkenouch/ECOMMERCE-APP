
  <div class = "fluid-container background-h2">        
    <h2>Messages</h2>
  </div>
       
        <table class="table table-striped" align="center">
                    <tr style="font-size:200%;">
                        <th> Expéditeur</th>
                         <th>Sujet</th>
                         <th>Message</th>
                    
                     </tr>
                  
        <?php
            $sql11 = "SELECT * FROM messagerie ;";

            $result11 = mysqli_query($link, $sql11);

          ?>
          <?php
            if (mysqli_num_rows($result11) > 0) {
            while ($row11 = $result11->fetch_assoc()) {
                $ide=$row11["id"];
                $contact_name=$row11["expediteur"];
                $contact_email = $row11["email"];
                $contact_subject= $row11["subject"];
                $contact_message= $row11["message"];
               
                $contact_etat= $row11["etat"];                
                ?>
              <tr id="<?php echo $ide."id" ?>">
                <td><?php echo $contact_name?><br><?php echo $contact_email?></td>
                <td><?php echo $contact_subject?></td>
                <td><?php echo $contact_message?></td>
                
                <td>
                <?php
                if($contact_etat==="non_lu"){
                ?>
                <div id="<?php echo $ide ?>">
                <button  class="btn btn-outline-secondary"  value="<?php echo $ide ?>" onclick="message_lu(this.value)">Lu</button>
                </div>
                <?php
                } else {
                ?>
                <?php
                echo $contact_etat ; }
                ?>
                </td>
                <td><button class="btn btn-outline-secondary" value="<?php echo $ide ?>" onclick="remove_message(this.value)">Supprimer</button></td>
              </tr>

                
            <?php }}
      
            ?>
          </table>

<script>
	function remove_message(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str+"id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "remove_message.php?q="+str, true);
    xhttp.send();
  }
</script>
<script>
	function message_lu(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str).innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "message_lu.php?q="+str, true);
    xhttp.send();
  }
</script>


