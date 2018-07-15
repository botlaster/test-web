<?php
session_start();

include_once("lib/connect.php");
//include_once("lib/config.inc.php");
$conn=new Class_Db();
$sql="select * from tb_user";
$query=$conn->query($sql);
echo "จำนวนแถวของ tb_user คือ ".$conn->num_rows();
//var_dump($query);

while($r = mysqli_fetch_array($query))
{
	echo "<p>ข้อมูล".$r['user_id']." ".$r['username']." ".$r['password']." ".$r['nameuser']." ".$r['type_user_id']." ".$r['day']."</p>";
}
//var_dump($query);
//$conn->fetch_array($query);
/*foreach($conn->fetch_array()as $r)
{
	echo "<p> ข้อมูล ".$r['user_id']." ".$r['username']." ".$r['password']." ".$r['nameuser']."</p>";
}
*/
$date = date("Y-m-d");
$time = date("H:i:s");
echo "<br>".$date;
echo "<br>".$time;
$time = str_replace(":" ,"", $time);
$date = str_replace("-" ,"", $date);
echo "<br>".$date;
echo "<br>".$time;
?>
<!doctype html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8"/>
<title>Test Connect DB</title>
<body>
</body>
</head>
</html>