
var a=1;
function update_password() {

    if(a==1){
        document.getElementById("update_password").style.display='inline';
        return a=0;
    }
    else{
        document.getElementById("update_password").style.display='none';
        return a=1;
    } 
  
} 