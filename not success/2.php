<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<Form Action="show_bus_id.php"Methods="post">
<CENTER>
<CENTER><BR>
<FONT SIZE=4><B>แสดงรายละเอียดแต่ละเบอร์รถโรงเรียน</B><HR color=##FF00CC> </FONT>
<BR>
<FONT SIZE=4>
<TABLE Border="0" Bgcolor="#bbff"Face="Ms Sans Serif" >

<TR><Td>เลือกเบอร์รถ</td><td><select name = bus_id>
<?php
//อ่านข้อมูลจากตารางวิชาเอกใส่ list
require_once("dbConnect.php");
//คำสั่ง SQL และคำสั่งให้ทำงาน
$sql = "select bus_id from bus_std order by bus_id";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
//บรรจุข้อมูลเข้า list
$i=0;
while($i<$num_rows){
 $result =mysql_fetch_array($dbquery);
 $bus_id=$result["bus_id"];
// $f_name=$result["route_name"];
 echo"<option value =".$bus_id.">".$bus_id;
 $i++;
  } 
?>
</select>
<Input Type = Hidden Name=Action Value="Add">
<Input Type = Submit Value="ค้นหา"><tr>
<BR>

</TABLE>

</Form>
</CENTER>
