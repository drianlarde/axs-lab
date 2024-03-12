
var pos = 0;

window.setInterval(function(){
  pos++;
  document.getElementsByClassName('parallax-homes')[0].style.backgroundPosition = pos + "px 0px";
}, 40);	