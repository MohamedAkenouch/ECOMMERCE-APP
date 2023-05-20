

      <div class="container">
      <table class="table table-striped">   
            <tr> 
              <th><h3>Couleur</h3></th>
              <th><h3>Taille</h3></th>
              <th><h3>Quantité</h3></th>
              <th><h3>Màj la quatité</h3></th>
              <th><h3>Modifier</h3></th>
              <th><h3>Supprimer</h3></th>
            </tr>
            <?php

            $asql = "SELECT * FROM products WHERE product_name='$product_name' ;";

            $aresult = mysqli_query($link, $asql);

          ?>
          <?php
            if (mysqli_num_rows($aresult) > 0) {
            while ($arow = $aresult->fetch_assoc()) {
                $aproduct_id=$arow["product_id"];
                $acolor=$arow["product_color"];
                $asize = $arow["product_size"];
                $aquantity= $arow["product_quantity"];
                ?>



              <tr id="<?php echo $aproduct_id."id" ?>">

                <td><small>color: <span style="margin-left:10px;padding-right:40px;;background-color:<?php echo $acolor ?>;color:<?php echo $acolor?>;">.</span></small><br></td>
                <td><?php echo $asize?></td>
                <td id="<?php echo $aproduct_id?>"><?php echo $aquantity?></td>
                <td><input id="new_quantity" style="text-align:center;" type="text"></td>
                <td ><button class="btn btn-outline-secondary" value="<?php echo $aproduct_id?>" onclick="modify_quantity(this.value)">Modifier</button></td>
                <td><button class="btn btn-outline-secondary" value="<?php echo $aproduct_id ?>" onclick="remove_product_color(this.value)">Supprimer</button></td>
              </tr>

                
            <?php }}
            ?>

          </table>





      </div>






















<script>
	function add_info_product(number) {
    

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById(number).innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "test6.php?q="+number, true);
      xhttp.send();
      document.getElementById("more").value = number+1;

  }

</script>

  <script>
	function remove_product_color(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str+"id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "remove_product_color.php?q="+str, true);
    xhttp.send();
  }


</script>
<script>
	function modify_quantity(str) {
    var new_qua = document.getElementById("new_quantity").value;
    var res= str+"."+new_qua;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str).innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "modify_quantity.php?q="+res, true);
    xhttp.send();
  }
</script>

<script>
	function add_info_product(number) {
    

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById(number).innerHTML =
          this.responseText;
        }
      };
      xhttp.open("GET", "test5.php?q="+number, true);
      xhttp.send();
      document.getElementById("more").value = number+1;

  }

</script>
