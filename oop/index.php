<?php
include_once("class.php");
//error_reporting(E_ALL);
$name="name in class.php";
myClass::Main("This static function Main Variable $name");
myClass::Main2();
$obj=new myClass;
$obj->sayhi();
$obj->name="You";
$obj->sayhi();
$obj->myEcho();
$obj->sta(10);
$obj->sta("20");
$obj->sta("");
echo "<br>".$obj->myAttr."<br>".myClass::myConst."<BR><BR>"; //เรียกใช้้ค่าคงที่ไม่ต้องประกาศตัวแปรหรือ constant
$obj2=new myClass2;
$obj2->sayhi();
$obj2->parents();
echo "<br><br><br>";
$obj3=new child();
$obj3->myEcho();
$obj4=new testt;
$obj4->a();
echo "<BR>";
$obj4->c();
//echo myClass::$sta;
echo myclass::$sta.myclass::sta; //เรียกใช้ออฟเจคแบบไม่ต้องประกาศตัวแปรเพราะ statsic
echo "<BR><BR>";
?>