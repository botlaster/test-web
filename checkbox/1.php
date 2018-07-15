<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> </title>
<style type="text/css">
 
.row_css1{
    background-color:#f4f2f5;   
}
.row_css2{
    background-color:#f2e8f5;   
}
.row_css1:hover,
.row_css2:hover{
    background-color:#EAEAEA;   
}
 
.hiligh_select_row{
    background-color: #9DFFBD;
}
.hiligh_select_row:hover{
    background-color: #9DFFBD;
}
</style>
</head>
 
<body>
 
 
<div style="margin:auto;width:80%;">
 
<br />
<form id="form_test_shift_checkbox" name="form_test_shift_checkbox" method="post" action="">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td width="30" height="25" align="center" bgcolor="#D6D6D6"><input name="check_all_item" type="checkbox" id="check_all_item" value="1" /></td>
    <td width="30" height="25" align="center" bgcolor="#D6D6D6">#</td>
    <td height="25" bgcolor="#D6D6D6">&nbsp;Topic</td>
  </tr>
<?php
for($i=1;$i<=10;$i++){
?>  
  <tr  id="IDrow<?=$i?>" class="<?=($i%2==0)?"row_css1":"row_css2"?>">
    <td width="30" height="25" align="center">
      <input name="my_checkbox[]"  type="checkbox" id="my_checkbox[]" class="css_my_checkbox" onclick="toggle_class('<?=$i?>');" value="<?=$i?>" />
  </td>
    <td width="30" height="25" align="center"><?=$i?></td>
    <td height="25">&nbsp; Data <?=$i?></td>
  </tr>
<?php  }?>  
</table>
  </form>
<br />
<br />
 
 
</div>
 
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
<script type="text/javascript">
$(function(){
 
// เมื่อ checkbox คลาส css_my_checkbox ถูกติ๊ก 
    $(".css_my_checkbox").click(function(e){
        // ตรวจสอบถ้าปุ่ม shift ถูกกดอยู่
        if(e.shiftKey){
            // เก็บค่า ลำดับของ checkbox ที่ถูกติ๊กเลือก
            var nowID_chk=$(".css_my_checkbox").index(this);
            // กำหนดตัวแปร เก็บค่าลำดับ checkbox ก่อนหน้าที่ถูกติ๊กเลือก
            var first_index_check=null;
            // วนลูปหา ค่า ลำดับ chexbox ก่อนหน้าที่ถูกติ๊กเลือก
            $(".css_my_checkbox:lt("+nowID_chk+")").each(function(i,k){
                // เริ่มเก็บค่า ลำดับ checkbox ก่อนหน้าที่ถูกติ๊กเลือก เฉพาะรายการที่ถูกติ้กเท่านั้น
                if($(".css_my_checkbox:eq("+i+")").prop("checked")==true){
                    // เก็บค่าไว้ในตัวแปร
                    first_index_check=i;
                }   
            }); 
            // ถ้ามีค่า ลำดับ checkbox ก่อนหน้าที่ถูกเลือก และไม่อยู่ติดกัน
            if(first_index_check!=null && nowID_chk-first_index_check>1){
                // กำหนดตัวแปร เก็บค่า ลำดับต่อจาก ลำดับ checkbox ก่อนหน้าที่ถูกติ๊กเลือก
                var nextToCheck=first_index_check+1;
                // วนลูปทำงานเลือกเฉพาะ checkbox ที่ยังไม่ถูกเลือก
                for(i=nextToCheck;i<nowID_chk;i++){
                    // เก็บค่าสำหรับ อ้างอิงลำดับแถวของตาราง
                    var rowID=$(".css_my_checkbox:eq("+i+")").val();
                    // เปลี่ยนสีพื้นหลัง เป็นรายการที่ถูกเลือก
                    toggle_class(rowID);
                    // กำหนด checkbox ตามเงื่อนไข ให้ถูกติ้กเลือกทั้งหมด
                    $(".css_my_checkbox:eq("+i+")").prop("checked",true);
                }
            }
        }
    });
     
    $("#check_all_item").click(function(){
        var i_check=$(this).prop("checked");
        if(i_check==true){
            $(".row_css1,.row_css2").addClass("hiligh_select_row");
            $(".css_my_checkbox").prop("checked",true);
        }else{
            $(".row_css1,.row_css2").removeClass("hiligh_select_row");
            $(".css_my_checkbox").prop("checked",false);
        }
    }); 
     
});
</script>
<script type="text/javascript">
function toggle_class(rowID){
    var placeRow="IDrow"+rowID; 
    $("#"+placeRow).toggleClass("hiligh_select_row");
}
</script>
</body>
</html>