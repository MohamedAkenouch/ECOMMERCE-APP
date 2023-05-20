function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }


var i = 0;
var images = [];
var time = 3000;
images[0] ="try.png" ;
images[1] ="s.png";
images[2] ="ss.png";
function switchImg(){
  document.slide.src = images[i];
  if(i< images.length - 1){
    i++;

  } else {
    i = 0;
  }
  setTimeout("switchImg()", time);
}
window.onload = switchImg;


let slider = document.querySelector('.scrollmenu');

let innerslider = document.querySelector('.scrollmenu-');
let pressed = false;
let startx;
let x;

slider.addEventListener('mousedown',(e) => {
  pressed = true;
  startx = e.offsetX - innerSlider.offsetLeft;
  Slider.style.cursor = 'grabbing';
});
slider.addEventListener('mouseenter',() => {
  Slider.style.cursor = 'grab'
});
slider.addEventListener('mouseup',() => {
  Slider.style.cursor = 'grab'
  pressed = false;  
});
slider.addEventListener('mousemove',(e) => {
  if(!pressed) return;
  e.preventDefault();
  x = e.offsetX;
  innerslider.style.left = '${x - startx}px';
});


