<?php
$config = array("host"=>"localhost", "user"=>"root", "pass"=>"", "dbname"=>"phpworkshop", "charset"=>"utf8",);
$con = new mysqli($config["host"],$config["user"],$config["pass"],$config["dbname"]);
$con->set_charset($config["charset"]);

if($con->connect_error)
{
	trigger_error("Database Connect Failed".$con->connect_error, E_USER_ERROR);
}
else 
{
	echo "Connect OK";
}