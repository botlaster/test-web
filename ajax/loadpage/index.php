<?php
include_once "class/class.php";
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<style>
</style>
<script>
window.onload=function()
{
	//setInterval('loadpage("page1.php")',2000);
	loadpage('page1.php');
}
function loadpage(para)
{
	if (window.XMLHttpRequest) 
	{
		x = new XMLHttpRequest();
	} 
	else 
	{
		x = new ActiveXObject("Microsoft.XMLHTTP");
	}
	x.onreadystatechange=function()
	{
		if(x.readyState==4 && x.status==200)
		{
			var content=document.getElementById("content");
			content.innerHTML=x.responseText;
		}
	}
	x.open("get",para);
	x.send(null);
}
</script>
</head>
<body>
<h1 style="text-align:center;background:grey;font-size:50px;">Ajax</h1>
<button onclick="loadpage('page1.php');">Page1</button>
<button onclick="loadpage('page2.php');">Page2</button>
<button onclick="loadpage('page3.php');">Page3</button>
<button onclick="loadpage('page5.php');">Page5</button>
<hr>
<div id="content"></div> 
<hr>
<?php
$obj=new useclass();
if(isset($_POST['a'])||isset($_POST['name']))
{
	if(isset($_POST['a']))
	{
		echo $_POST['a'];
	}
	else if(isset($_POST['name']))
	{
		echo $_POST['name'];
	}
}
else if(isset($_POST['b'])||isset($_POST['name']))
{
	if(isset($_POST['b']))
	{
		echo $_POST['b'];
	}
	else if(isset($_POST['name']))
	{
		echo $_POST['name'];
	}
}
if(isset($_POST['name']))
{
	$sql="insert into tb_facility(name) values('".$_POST['name']."')";
	if($obj->query($sql))
	{
		include "page3.php";
	}
}
?>
<form method="post" action="">
<input type="text" name="name" onkeyup="loadpage('page1.php')" required>
<input type="submit" value="Submit">
</form>
</body>
</html>
