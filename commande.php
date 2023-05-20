
<?php

session_start();
require_once "config.php";

$resultat = $_REQUEST["q"];
$res = explode(".",$resultat);
$commande_id = $res[0];
$quantity = $res[1];
$stat = "En attente de validation";


$sql = "UPDATE commandes
SET stat = 'waiting for validation' , quantity ='$quantity'
WHERE commande_id = '$commande_id';";
$result = mysqli_query($link, $sql);

$sql2 = "SELECT product_name,product_price,category,product_image,product_color,product_size,product_id,product_quantity FROM products,commandes WHERE products.product_id=commandes.fk_product_id AND commande_id = '$commande_id'";
$result2 = mysqli_query($link, $sql2);
if (mysqli_num_rows($result2) > 0) {
    while ($row = $result2->fetch_assoc()) {
        $product_id = $row["product_id"];
        $product_quantity = $row["product_quantity"];
        $new_product_quantity = $product_quantity - $quantity;
        $product_name = $row["product_name"];
        $product_image = $row["product_image"];
        $product_price = $row["product_price"];
        $product_color = $row["product_color"];
        $product_size = $row["product_size"];
        $category = $row["category"];

        $sql3 = "UPDATE products
        SET product_quantity ='$new_product_quantity'
        WHERE product_id = '$product_id';";
        $result3 = mysqli_query($link, $sql3);

    }}
    ?>

    <tr id = "<?php echo $commande_id."id"?>">
    <td>
        <div class='cart-info'>
            <img src='products_images\<?php echo $product_image ?>'>
            <div>
                <p><?php echo"$product_name"?></p>
                <small>Catégorie: <?php echo"$category"?></small><br>
                <small >Couleur:<span style="margin-left:10px;padding-right:40px;;background-color:<?php echo"$product_color"?>;color:<?php echo"$product_color"?>;">.</span></small><br>
                <small>Taille: <?php echo"$product_size"?></small><br>
                
            </div>
        </div>
    </td>
    <td>
        <?php echo $quantity;?>
    
    
    </td>
    <td><?php echo"$product_price"?>$</td>
   
    <td>
        <?php 
            echo $stat;
        ?>
    </td>
    

</tr>

                







