<?php
$i = $_REQUEST["q"];

$number = strlen($i);
?>



<div>
<div id="cara">

  <div id="col_im">
    <label style="float:left;margin-right:5px;" for="color">Couleur :</label>
    <input style="float:left;width:20%;height:80%;"  type="color"  name="color[<?php echo $number ?>][]">
    <input style="float:right;margin-right:5px;" type="file"  name="image[<?php echo $number ?>][]">
    <label style="float:right;" for="image">Image :</label>
  </div>

<p style="text-align:center;font-size:200%">Taille</p> 

  <div class="row">

  <div class="col">
  <label for="S"> S </label>
  <input style="margin-right:20px" type="checkbox"  name="size[<?php echo $number ?>][0][]" value="S">
  <label for="quantity">Quantité</label>
  <input id="quantity" type="text" name="quantity[<?php echo $number ?>][0][]" pattern="[0-9].{0,500}">
  </div>

  <div class="col">
  <label for="M"> M </label>
  <input style="margin-right:20px" type="checkbox"  name="size[<?php echo $number ?>][1][]" value="M">
  <label for="quantity">Quantité</label>
  <input id="quantity" type="text" name="quantity[<?php echo $number ?>][1][]" pattern="[0-9].{0,500}">
  </div>

  <div class="col">
  <label for="L"> L </label>
  <input style="margin-right:20px" type="checkbox" name="size[<?php echo $number ?>][2][]" value="L">
  <label for="quantity">Quantité</label>
  <input id="quantity" type="text" name="quantity[<?php echo $number ?>][2][]" pattern="[0-9].{0,500}">
  </div>

  </div>

  </div>





<div id="<?php echo $i."1" ?>"></div>
