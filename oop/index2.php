<?php
$con=mysqli_connect("localhost", "root", "","wb") or die("Could not connect: " . mysqli_error());
if($con)
{
	echo "Connected";
}
$result = mysqli_query($con,"SELECT * FROM tb_user");
var_dump($result);
while ($row = mysqli_fetch_array($result)) 
{
	printf ("<br>ID: %s  Name: %s ", $row[0], $row["username"]);
//	echo "<br>ID: %s  Name: %s", $row[0], $row["username"];
}
mysqli_free_result($result);