<div class = "fluid-container background-h2">        
    <h2>Table d'utilisateurs</h2>
  </div>
      <table class="table table-striped">   
            <tr> 
              <th><h3>Nom d'utilisateurs</h3> </th>
              <th> <h3>Email</h3></th>
              <th> <h3>Numéro de téléphone</h3> </th>
              <th> <h3>Supprimer</h3> </th>

            </tr>
          <?php
            $sql2 = "SELECT * FROM clients;";

            $result2 = mysqli_query($link, $sql2);

          ?>
          <?php
            $users_number=0;
            if (mysqli_num_rows($result2) > 0) {
            while ($row2 = $result2->fetch_assoc()) {
              $users_number+=1;
                $client_id=$row2["client_id"];
                $client_name = $row2["client_name"];
                $client_phone= $row2["phone_number"];
                $email= $row2["email"];
                if($row2["client_id"]!=1){
                ?>
              <tr id="<?php echo $client_id."id" ?>">
                <td><?php echo $client_name?></td>
                <td><?php echo $email?></td>
                <td><?php echo $client_phone?></td>
                <td><button class="btn btn-outline-secondary" value="<?php echo $client_id ?>" onclick="remove_user(this.value)">Supprimer</button></td>
              </tr>

                
            <?php }}}
              $users_number-=1;
            ?>
          </table>

<script>
	function remove_user(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str+"id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "remove_user.php?q="+str, true);
    xhttp.send();
  }
</script>
