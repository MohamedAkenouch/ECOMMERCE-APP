<div class="container" style="margin-bottom:10%;">

    <table style="margin-top:10%" class="table table-dark table-hover bg-dark">
            <tr> <!--------------->  

                <th><p >Produit</p> </th>
                <th><p style="text-align: center">Quantité</p></th>
                <th><p style="text-align: center">Prix</p></th>
                <th><p style="text-align: center"></p></th>


            </tr >
            <?php
            if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_quantity = $row["product_quantity"];
                $commande_id = $row["commande_id"];
                $product_id = $row["product_id"];
                $product_name = $row["product_name"];
                $product_image = $row["product_image"];
                $product_price = $row["product_price"];
                $category = $row["category"];
                $quantity = $row["quantity"];
                $product_color = $row["product_color"];
                $product_size = $row["product_size"];
                $etat = $row["stat"];
          
            
            ?>
            
            <?php include 'element_cart.php'; ?>
    

           



            <?php }} ?>
        </table>
        </div>
