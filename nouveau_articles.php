<?php
 $sql = "SELECT * FROM articles ORDER BY articles_date DESC ; ";
  $result = mysqli_query($link, $sql);
?>
<link rel="stylesheet" href="articles.css">

<style>
.article_row > .article_column {
    padding: 0 0;
  }

  .article_row:after {
    content: "";
    display: table;
    clear: both;
  }	

  .article_column {
   float: left;
    width: 45%;
    margin-left: 2.5%;
    margin-right: 2.5%;
    margin-bottom: 2vw;
  }

  #title{
      font-size: 4vw;
      text-align: center;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }
#body{
    font-size: 1.25vw;
}
#read-more{
    font-size:2vw;
    float:right;
    color:black;
}
</style>
<div class="fluid-container">
<div class="article_row">

<?php
$j=0;
if (mysqli_num_rows($result) > 0) {
  while ($row = $result->fetch_assoc()) {
  $j+=1;
  if($j===3){
    break;
  }
  
    $article_id = $row["article_id"];
	$title = $row["article_title"];
	$body = $row["article_body"];
    $image = $row["article_image"];
    $body_new="";
    if(strlen($body)>140){
        for ($i = 0; $i <= 140 ; $i+=1) {
            $body_new = $body_new.$body[$i];
           }
    }
  


    ?>
    <div class="article_column" id="<?php echo $article_id."id" ?>">			
        <h3 id="title"><?php echo $title ?></h3>
        <img style="width: 100%;" src="<?php echo $image ?>" alt="">
        <p id="body">
        <?php
        if(empty($body_new)){
            echo $body;
        } else {
            echo $body_new."..." ;
        }
        
         
         ?>
        
        </p>
        <?php if($client_id===1){ ?>
        <button style="float:right;" class="btn btn-outline-secondary" value="<?php echo $article_id ?>" onclick="remove_article(this.value)">Supprimer</button>
        <?php  } ?>
        
				
	</div>	
    
		
<?php		
	}}

?>

</div>
</div>

<div class="container" style="margin-bottom:3%">
<a href="articles.php" id="read-more">Lire plus>></a>
</div>
<script>
	function remove_article(str) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(str+"id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "remove_article.php?q="+str, true);
    xhttp.send();
  }


</script>
