<?php
include("class2.php");

$data = array
(
'txt_uid'=>$_POST['txt_uid'],
'txt_upass'=>$_POST['txt_upass'],
'txt_name'=>$_POST['txt_name'],
'txt_surname'=>$_POST['txt_surename'],
'rdosex'=>$_POST['rdosex'],
'txt_mobile'=>$_POST['txt_mobile'],
'txt_email'=>$_POST['txt_email'],
'txt_addr'=>$_POST['txt_addr'],
);
$sql="insert into tb_user(UID, UPASS, Name, Surename, SexID, Mobile, Email, Address values(?, ?, ?, ?, ?, ?, ?, ?)";
$qr = $con->prepare($sql);
if($qr === false)
{
	trigger_error("Wrong SQL : ".$sql." Error :".$con->error, E_USER_ERROR);
}
$qr->bind_param("ssssssss", $data["txt_uid"], $data["txt_upass"], $data["txt_name"], $data["txt_surename"], $data["rdosex"], $data["txt_mobile"], $data["txt_email"], $data["txt_addr"]);
$qr->execute();

echo "Insert to database : ", $qr->affected_rows, " row";
$qr->close();