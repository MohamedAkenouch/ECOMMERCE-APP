            <?php 

            if($etat!="validate and done" || $etat!="refused and done"){
            
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
                            <?php if($etat==="non commander"){ ?>
                            <button value="<?php echo $commande_id ?>" onclick="remove_commande(this.value)">Supprimer</button>
                            <?php       
                                }
                            ?>
                        </div>
                    </div>
                </td>
                <td>
                <?php 
                    if($etat==="non commander"){ ?>
                    <select style="margin-top:25%;" class="form-select"  id="<?php echo $commande_id."id2"?>">
                        <?php 
                            for ($x = 1; $x <= $product_quantity; $x+=1) { ?>
                                <option  value="<?php echo $x ?>"><?php echo $x ?></option>
                         <?php       
                            }
                        ?>
                        
                    </select>
                    <?php
                    } else {  ?>

                    <p><?php echo"$quantity"?></p>
      
                        <?php } ?>

                
                
                </td>
                <td><p><?php echo"$product_price"?>$</p></td>
               
                <td>
                    <?php 
                        if($etat==="non commander"){ ?>
                            <div id="<?php echo $commande_id?>"> 
                            <button style="margin-top:10%;margin-right:25%" class="btn btn-light" type="button" value="<?php echo $commande_id ?>" onclick="commande(this.value)">Commander</button>
                            </div>


                        <?php } elseif ($etat==="waiting for validation"){ ?>
                            <p><?php echo $etat; ?></p>


                        <?php } elseif($etat==="validate") { ?>
                            <p style="text-align: center;margin-top:25%;"><?php echo $etat; ?></p>
                            <button style="" class="btn btn-light" type="button" value="<?php echo $commande_id ?>" onclick="done_validate(this.value)">OK</button>
                        
                        
                        
                        <?php } else {
                            
                            ?>
                            <p style="text-align: center;margin-top:20%;"><?php echo $etat; ?></p>
                            <button style="" class="btn btn-light" type="button" value="<?php echo $commande_id ?>" onclick="done_refused(this.value)">OK</button>
                        <?php 
                             } 
                    ?>
                       
                   

                </td>
                

            </tr>

            <?php
         } 
         
         ?>
   
 
