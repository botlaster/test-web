<html>
<head>
<title>SERVER</title>
</head>
<body>
<?php
echo "\$_SERVER[\"HTTP_ACCEPT\"] = ".$_SERVER["HTTP_ACCEPT"]."<br>";
echo "\$_SERVER[\"HTTP_ACCEPT_LANGUAGE\"] = ".$_SERVER["HTTP_ACCEPT_LANGUAGE"]."<br>";
echo "\$_SERVER[\"HTTP_ACCEPT_ENCODING\"] = ".$_SERVER["HTTP_ACCEPT_ENCODING"]."<br>";
echo "\$_SERVER[\"HTTP_USER_AGENT\"] = ".$_SERVER["HTTP_USER_AGENT"]."<br>";
echo "\$_SERVER[\"HTTP_HOST\"] = ".$_SERVER["HTTP_HOST"]."<br>";
echo "\$_SERVER[\"HTTP_CONNECTION\"] = ".$_SERVER["HTTP_CONNECTION"]."<br>";
echo "\$_SERVER[\"PATH\"] = ".$_SERVER["PATH"]."<br>";
echo "\$_SERVER[\"SystemRoot\"] = ".$_SERVER["SystemRoot"]."<br>";
echo "\$_SERVER[\"COMSPEC\"] = ".$_SERVER["COMSPEC"]."<br>";
echo "\$_SERVER[\"PATHEXT\"] = ".$_SERVER["PATHEXT"]."<br>";
echo "\$_SERVER[\"WINDIR\"] = ".$_SERVER["WINDIR"]."<br>";
echo "\$_SERVER[\"SERVER_SIGNATURE\"] = ".$_SERVER["SERVER_SIGNATURE"]."<br>";
echo "\$_SERVER[\"SERVER_SOFTWARE\"] = ".$_SERVER["SERVER_SOFTWARE"]."<br>";
echo "\$_SERVER[\"SERVER_NAME\"] = ".$_SERVER["SERVER_NAME"]."<br>";
echo "\$_SERVER[\"SERVER_ADDR\"] = ".$_SERVER["SERVER_ADDR"]."<br>";
echo "\$_SERVER[\"SERVER_PORT\"] = ".$_SERVER["SERVER_PORT"]."<br>";
echo "\$_SERVER[\"REMOTE_ADDR\"] = ".$_SERVER["REMOTE_ADDR"]."<br>";
echo "\$_SERVER[\"DOCUMENT_ROOT\"] = ".$_SERVER["DOCUMENT_ROOT"]."<br>";
echo "\$_SERVER[\"SERVER_ADMIN\"] = ".$_SERVER["SERVER_ADMIN"]."<br>";
echo "\$_SERVER[\"SCRIPT_FILENAME\"] = ".$_SERVER["SCRIPT_FILENAME"]."<br>";
echo "\$_SERVER[\"REMOTE_PORT\"] = ".$_SERVER["REMOTE_PORT"]."<br>";
echo "\$_SERVER[\"GATEWAY_INTERFACE\"] = ".$_SERVER["GATEWAY_INTERFACE"]."<br>";
echo "\$_SERVER[\"SERVER_PROTOCOL\"] = ".$_SERVER["SERVER_PROTOCOL"]."<br>";
echo "\$_SERVER[\"REQUEST_METHOD\"] = ".$_SERVER["REQUEST_METHOD"]."<br>";
echo "\$_SERVER[\"QUERY_STRING\"] = ".$_SERVER["QUERY_STRING"]."<br>";
echo "\$_SERVER[\"REQUEST_URI\"] = ".$_SERVER["REQUEST_URI"]."<br>";
echo "\$_SERVER[\"SCRIPT_NAME\"] = ".$_SERVER["SCRIPT_NAME"]."<br>";
echo "\$_SERVER[\"PHP_SELF\"] = ".$_SERVER["PHP_SELF"]."<br>";
echo "\$_SERVER[\"REQUEST_TIME\"] = ".$_SERVER["REQUEST_TIME"]."<br>";
echo time()."<BR>";
$a=str_replace("/ba/","",$_SERVER['PHP_SELF']);
echo $a."<BR>";
echo basename(__FILE__)."<BR>";
echo "\$_SERVER[\"argv\"] = ".$_SERVER["argv"]."<br>";
echo "\$_SERVER[\"argc\"] = ".$_SERVER["argc"]."<br>";
?>
</body>
</html>