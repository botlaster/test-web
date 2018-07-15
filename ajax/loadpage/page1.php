<?php
for($i=1;$i<=10;$i++)
{
	echo $i."<br>";
}
if(isset($_POST['name']))
{
	echo $_POST['name'];
}
?>
<html>
<body>
<form action="" method="post">
<input type="text" name="a">
<input type="submit" value="Submit">
</form>
</body>
</html>

