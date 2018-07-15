<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Response to AJAX</title>
<style>
	table{width=60%;border-collapse:collapse;}
	table,td,th{border:1px solid black;padding:5px;}
	th{text-align:left;}
</style>
</head>
<body>
<?php
	//รับข้อมูลที่ส่งมาจาก Ajax engine
	$id=intval($_POST['q']);
	$con=mysqli_connect("localhost","root","password");
	if(!$con){
		die("Could not connect : ".mysqli_error($con));	
	}
	mysqli_select_db($con,"stockk");
	$sql="select * from product";
	$result=mysqli_query($con,$sql);
	//ส่ง response กลับไปให้ Ajax engine
	echo"<table><tr><th>First name</th>
		<th>Last Name</th>
		<th>Age</th>
		<th>Home Town</th>
		<th>Job</th></tr>";
		/*while($row=mysqli_fetch_array($result,"MY-ASSOC")){
			echo "<tr><td>".$row['idproduct']."</td>";
			echo "<td>".$row['pname']."</td>";
			echo "<td>".$row['brand']."</td>";
			echo "<td>".$row['balance']."</td>";
			echo "<td>".$row['balance']."</td></tr>";
		}*/
		while($data=mysqli_fetch_array($result))
		{
			echo "<tr><td>".$data['idproduct']."</td></TR>";
		}
		echo "</table>";
		mysqli_close($con);
?>
</body>
</html>