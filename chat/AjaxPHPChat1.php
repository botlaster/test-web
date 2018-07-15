<?php
	/*** By Weerachai Nukitram ***/
	/***  http://www.ThaiCreate.Com ***/
?>
<html>
<head>
<title>ThaiCreate.Com Ajax Tutorial</title>
<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'AjaxPHPChat2.php';
		  var pmeters = "tName=" + encodeURI( document.getElementById("txtName").value) +
						"&tMessage=" + encodeURI( document.getElementById("txtMessage").value );

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpan").innerHTML = "Now is Loading...";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {			  
					  document.getElementById('mySpan').innerHTML = HttPRequest.responseText;
					 	
						//  focus //
						var el = document.getElementById('mydiv');
						el.tabIndex = 32456;
						el.focus();
  
				  }				
			}

	   }
	</script>
</head>
<body Onload="JavaScript:doCallAjax()">
<h1>My Chat Room </h1>
<table width="566" height="315" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td width="575" height="291" valign="top">
	<div style=width:570;height:280;overflow:auto> 
	<span id="mySpan"></span>
	</div>
	</td>
  </tr>
  <tr>
    <td height="22" valign="top"><form action="" method="post" name="frmMain" id="frmMain">
      <div align="center">
        <br>
        Name
        <input name="txtName" type="text" id="txtName" size="5">
        Message
        <input name="txtMessage" type="text" id="txtMessage" size="40">
        <input name="btnSend" type="button" id="btnSend" value="Send" onClick="JavaScript:doCallAjax();">
      </div>
    </form></td>
  </tr>
</table>

</body>
</html>