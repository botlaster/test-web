<script language="javascript">
function js_popup(theURL,width,height) { //v2.0
	leftpos = (screen.availWidth - width) / 2;
    	toppos = (screen.availHeight - height) / 2;
  	window.open(theURL, "viewdetails","width=" + width + ",height=" + height + ",left=" + leftpos + ",top=" + toppos);
}
</script>

<a href="#" onClick="js_popup('test2.php',783,600); return false;" title="Code PHP Popup">Test Code PHP Popup</a>

*** สามารถกำหนดขนาดได้ตามที่ต้องการเลยนะครับ และหากต้องการส่งค่า PHP ไปด้วยก็สามารถทำได้เช่นกันครับ
ดังนี้ <a href="#" onClick="js_popup('test2.php?id=0001',783,600); return false;" title="Code PHP Popup">Test Code PHP Popup</a>