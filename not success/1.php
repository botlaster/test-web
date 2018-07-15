<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<?
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("mydatabase");
?>
<body>
	<form action="login.html" method="post" name="form1">
		List Menu<br>
		  <select name="lmName1">
			<option value=""><-- Please Select Item --></option>
			<?
			$strSQL = "SELECT * FROM customer ORDER BY CustomerID ASC";
			$objQuery = mysql_query($strSQL);
			while($objResuut = mysql_fetch_array($objQuery))
			{
			?>
			<option value="<?=$objResuut["CustomerID"];?>"><?=$objResuut["CustomerID"]." - ".$objResuut["Name"];?></option>
			<?
			}
			?>
		  </select>
		<input name="btnSubmit" type="submit" value="Submit">
	</form>
</body>
</html>
<?
	mysql_close();
?>