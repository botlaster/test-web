<!doctype html>
<html lang="en">
 <head>
 <style>
 .w3-hover-green:hover{color:#fff!important;background-color:#99CCFF!important}
 table {
  border-spacing: 0.2em 0.7em;
  font-family: hobo std medium; <!--goudy stout regular,hobo std medium,showcard gothic regular->
}
 td{
 height:50px;
 width:50px;
 text-align:center;
    border-radius: 15px;
 }
 </style>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
<script src="js.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
 </head>
 <body>
 <a href="#room">Link</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <table id="room" border=10 align=center>
	<?php
			echo '<tr>';
		for($i=1;$i<=70;$i++)
		{ 
			
			echo '<td bgcolor="#FF0000"  class="w3-hover-green">';
			echo $i;
			echo '</td>';
			if(($i)%8==0)
			{
				echo '</tr>';
				echo '<tr>';
			}
		}
		
			echo '</tr>';
	?>
  </table>
  asdfbzcxvs
   
 </body>
</html>
