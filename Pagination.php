<!DOCTYPE html>
<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
<meta charset="UTF-8"/>
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
</head>
<body>
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("stock");
$strSQL = "SELECT * FROM detail inner join people on(detail.name = people.name) inner join product on (product.pname=detail.pname)";
mysql_query("SET NAMES UTF8");
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by time desc LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">pname </div></th>
    <th> <div align="center">in </div></th>
    <th> <div align="center">out </div></th>
    <th> <div align="center">balance </div></th>
    <th> <div align="center">name </div></th>
    <th> <div align="center">time </div></th>
  </tr>
<?php
while($objResult = mysql_fetch_array($objQuery))
{
?>
  <tr>
    <td><div align="center"><?php echo $objResult["pname"];?></div></td>
    <td><?php echo $objResult["inn"];?></td>
    <td><?php echo $objResult["outt"];?></td>
    <td><div align="center"><?php echo $objResult["balance"];?></div></td>
    <td align="right"><?php echo $objResult["name"];?></td>
    <td align="right"><?php echo $objResult["time"];?></td>
  </tr>
<?php
}
?>
</table>

<br>
Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
<?php
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
mysql_close($objConnect);
?>
</body>
</html>