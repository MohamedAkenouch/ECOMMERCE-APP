<main class="container">
          <div class="left-column">
             <?php      
              if (mysqli_num_rows($result4) > 0) {
                while ($row4 = $result4->fetch_assoc()) {
                  $product_image = $row4["product_image"];  
            ?>
            <div class="mySlides">
                <img src="products_images\<?php echo $product_image ?>" style="width:60%;margin-left:10%;">
            </div>
            <?php }} ?>
            <div style="margin-left:10%;" class="d-flex ">
              <?php 
                $counter = 0;
                if (mysqli_num_rows($result5) > 0) {
                  while ($row5 = $result5->fetch_assoc()) {
                    $counter+=1;
                    $product_image2 = $row5["product_image"]; 
              ?>
                <div class="p-2">
                <img src="products_images\<?php echo $product_image2 ?>" style="width:10vw;height:12vw;" onclick="currentSlide(<?php echo $counter ?>)">
              </div>
              <?php ; 
              }} ?>
            </div>
          </div>


            <div class="right-column">
              <!-- Product Description -->
              <div class="product-description">
                    <a href="#" class="link-category"><?php echo $category ?></a>
                    <h1><?php echo $product_name ?></h1>
                    <p><?php echo $product_desc ?></p>
            </div>
              <!-- Product Configuration -->
              <div class="product-configuration">

              <form action="" method="post">
           
           <!-- Product Color -->
           <div class="product-color">
               <span style="font-size:20px">Couleur</span>
       
               <div class="color-choose">
                 <div class="d-flex">
                    
                      <?php 
                      if (mysqli_num_rows($result3) > 0) {
                        while ($row3 = $result3->fetch_assoc()) {
                          $product_color = $row3["product_color"]; 
                      ?>
                          <div style="margin-left:1vw;" class="p-2">
                          <label for="<?php echo $product_color?>" class="container_color">
                            <input type="radio" id="<?php echo $product_color?>" name="color" value="<?php echo $product_color?>">
                           <span class="checkmark" style="background-color:<?php echo $product_color?> ;" ></span>
                            </label>
                            </div>

                          <?php }};  ?>
                 </div>
                </div>
            
              </div>  
       


                    <!-- Product size -->
                  <div class="product-size">
                    
                    <span style="font-size:20px">Taille</span>
                    <div class="size-choose">
                    <?php 
               
                      if (mysqli_num_rows($result2) > 0) {

                        while ($row2 = $result2 ->fetch_assoc()) {
                          $product_size = $row2["product_size"]; 
                      ?>
                     
                        <input type="radio"  name="size" value="<?php echo $product_size?>" >
                        <label for="<?php echo $product_size?>"><span><?php echo $product_size?></span></label>
                     
                      <?php }} ?>
                      </div>

                  </div>
              </div>

                   




              <div class="product-price">
                    <span>Prix : <?php echo $product_price ?>$</span>
                    <?php if($client_id!=1){ ?>
                    <input type="submit" value="Ajouter au panier" name = "insert" class="cart-btn">
                    <?php }?>

              </div>
              </form>
              <?php echo $error_commande; ?>


            </div>
          </main>
         
