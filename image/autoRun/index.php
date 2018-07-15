<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<h2 class="w3-center">Manual Slideshow</h2>

<div class="w3-content w3-display-container" id="slideshow">
  <img class="mySlides" src="images/1.jpg" style="width:100%">
  <img class="mySlides" src="images/2.png" style="width:100%">
  <img class="mySlides" src="images/3.jpg" style="width:100%">
</div>
<script>
var myIndex = 0;
carousel();
var a;
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    a=setTimeout(carousel, 1000); // Change image every 2 seconds
}
$("#slideshow").hover(function(){
   clearTimeout(a);
},function()
{
	carousel();
});
</script>

</body>
</html>
