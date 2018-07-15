<?php
sleep(3);

if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
{
	echo "<script>alert('Upload file successfully!');</script>";
	echo "<script>window.top.window.showResult('1');</script>";
}
else
{
	echo "<script>alert('Error! Cannot upload data');</script>";
	echo "<script>window.top.window.showResult('2');</script>";
}
?>