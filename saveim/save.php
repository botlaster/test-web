<?php
 
require_once 'connect.php';
print_r($_POST);
if(isset($_POST['save'])){
    echo '555';
    if($_FILES['rank_image']['name]'] != ""){
        $filename= md5($_FILES['rank_image']['name'].time());
        $ext=explode('.',$_FILES['rank_image']['name']);
        $dest=__DIR__.DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$filename.'.'.$ext[1];
        echo '666';
        if(!copy($_FILES['rank_image']['tmp_name'],$dest)){
            echo 'Upload Error';
            //echo "<body onload=\"window.alert('ไม่สามารถอัพโฟลดรูปภาพได้');returnhistory.go(-1)\">";
            exit();
            echo '777';
        }
        $rank_image = $filename.'.'.$ext[1];
        echo '888';
    }else{
        echo 'eiei';
    }
    echo '999';
    $rank_title = $_POST['rank_title'];   
    $rank_min = $_POST['rank_min'];   
    $rank_special = $_POST['rank_special'];
    echo '000';
    $sql = "INSERT INTO testdb(rank_title, rank_min, rank_special, rank_image)"
        . " VALUES ('$rank_title', $rank_min, $rank_special, '$rank_image')";
    echo '001';
    mysql_query($sql) or die('Insert Error');
    echo 'Insert Success';
    
}
