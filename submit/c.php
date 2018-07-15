<?php
if(isset($_POST['aa']))
{
	echo $_POST['1']." ".$_POST['aa'];
}
else if(isset($_POST['bb']))
{
	echo $_POST['2']." ".$_POST['bb'];;
}
?>
<html>
<head>
<script>
function show_alert() {
  if(confirm("Do you really want to do this?"))
	  document.getElementById("123").submit();
    //document.forms["123"].submit();
  else
    return false;
}
function shows_alert() {
  if(confirm("Do you really want to do this?"))
	document.getElementById("456").submit();
    //document.forms["456"].submit();
  else
    return false;
}
</script>
</head>
<body>
<form name="123" id="123" action="" method="post">
<a href="javascript:void(0)" onclick="show_alert();" name="aa">Send</a>
<input type="text" hidden value="A" name="1">
</form>
<form name="456" id="456" action="" method="post">
<a href="javascript:void(0)" onclick="shows_alert();" name="bb">Send</a>
<input type="text" hidden value="B" name="2">
</form>
</body>
</html>