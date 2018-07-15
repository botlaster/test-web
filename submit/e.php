<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
//	isset($_POST['q']) || isset($_POST['w'])
	echo $_POST['q']." ".$_POST['w']."<BR>";
	if($_POST['q']=="")
	{
		echo "5555";
	}
	else
	{
		echo ' ';
	}
}
?>
<html>
<head>
<script>
function show_alert() {
  if(confirm("1"))
	{
	document.getElementById("w").value=null;
	//document.getElementById("1").value="AAA";
    document.forms[0].submit();
	 // document.getElementById("123").submit();
	}
  else
	  {
    return false;
	  }
}
function shows_alert() {
  if(confirm("2"))
	{
	document.getElementById("q").value=null;
	//document.getElementById("2").value="BBB";
	//document.getElementById("123").submit();
    document.forms[0].submit();
	}
  else
	{
    return false;
	}
}
</script>
</head>
<body>
<form name="123" id="123" action="" method="post">
<a href="javascript:show_alert();" >Send</a>
<input type="text" value="1" name="q" id="q" hidden />
<a href="javascript:shows_alert();">Sends</a>
<input type="text" value="2" name="w" id="w" hidden />
</form>
</body>
</html>