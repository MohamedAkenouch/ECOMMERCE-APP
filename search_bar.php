
<style>


.dropdown {

  display: inline-block;
  width: 60%;



}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  width: 95%;
  margin-left:2%

}

.dropdown-content a {
  color: black;
  padding: 2% ;
  margin-left:5%;
  text-decoration: none;
  display: block;

}


.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<div class="dropdown">
    <input style="width: 95%;" type="text"  onkeyup="showHint(this.value)" name="search" id="header_search"  placeholder="Cherchez ce que vous voulez" aria-label="Search through site content" autocomplete="true" >

    <div class="dropdown-content" id="txtHint"></div>
</div>

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
    


