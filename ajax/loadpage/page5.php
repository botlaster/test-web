<?php
include_once "class.php";
?>
<html>
<head>
<style>
</style>
</head>
<body>
<?php
$obj=new useclass();
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
<input type="text" name="name" required>
<input type="submit" value="Submit">
</form>
<!--<div class="abc"><span><i class="fa fa-check" style="color:green;"></i><b>บันทึกเรียบร้อย</b></span></div>-->
<script>
</script>
</body>
</html>