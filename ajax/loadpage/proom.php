<?php
include_once "class/class.php";
$obj=new useclass();
$obj->checkLogin();

if(isset($_POST['hid'])&&$_POST['hid']!="")
{
	$b = explode(",",$_POST['hid']);
	$fur=$_POST['furniture'];
	$price=$_POST['price'];
	$building_id=$_SESSION['building_id'];
	for($i=0;$i<count($b);$i++)
	{
		$obj->setMoney($b[$i],$building_id,$price,$fur);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Config Rooms Rate</title>
<link rel='stylesheet' href='files/font-awesome.min.css'>
<link rel='stylesheet' href='files/bootstrap.min.css'>
<link rel='stylesheet' href='files/main.min.css'>
<link rel='stylesheet' href='css/proom.css'>
<script src='js/load.js'></script>
<script>
history.pushState(null, null, location.href);
window.onpopstate = function(event) {
    history.go(1);
};
function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

$(document).ready(function(){
     $(document).on("keydown", disableF5);
});
</script>
</head>
<body style='background-color: rgb(234, 234, 234);'>
<div id='header'></div>
<div id='arrow'></div>
<div class='container' style='padding:10px'>
	<div class='row'>
		<div class='col-xs-12'>
			<img src='images/banner-roomps.jpg' class='img-responsive'>
		</div>
	</div>
	<div class='row'>
		<div class='col-xs-12'>
			<div class='text-box-content clearfix'>
				<div class='row'>
				<?php
				$n=0;
				$f='';
				$str="select * from tb_rooms where building_id='".$_SESSION['building_id']."'";
				$query=$obj->query($str);
				while($r=mysqli_fetch_array($query))
				{
					$sf=substr($r['room_id'],0,2);
					$id=$r['room_id'];
					$simg=($r['price']!='0')?"<img class='room-transfer' src='images/set-rent-cost.png'>
												<div class='text-bottom'>
														 ".($r['price']+$r['furniture'])."
												</div>":"";
					$nn=($n!=0)?"</div></div></div>":"";
					if($sf==$f)
					{
						echo "
						<div class='col-xs-6 col-sm-5ths text-center' style='cursor:pointer'>
							<div class='room-label center-block'>".$r['name']."</div>
							<div class='room-div not-set c$sf' id='$id' onclick='selected(this.id);'>
								<div class='room-div-inner'>
									$simg
								</div>
							</div>
						</div>";
					}
					else
					{
						echo "
						$nn
						<div class='col-xs-12'>
							<div class='text-box-content clearfix'>
								<div class='heading clearfix'>
									<h2 class='clearfix'>
										ชั้นที่ $sf
										<div class='pull-right'>
											<button onclick='selectedAll(\"$sf\")' type='button' class=' btn btn-green btn-xs'>เลือกทั้งชั้น</button>
											<button onclick='deselectedAll(\"$sf\")' type='button' class=' btn btn-red btn-xs'>ไม่เลือก</button>
										</div>
									</h2>
								</div>
								<div class='content clearfix'>
									<div class='col-xs-6 col-sm-5ths text-center' style='cursor:pointer'>
										<div class='room-label center-block'>".$r['name']."</div>
										<div class='room-div not-set c$sf' id='$id' onclick='selected(this.id);'>
											<div class='room-div-inner'>
												$simg
											</div>
										</div>
									</div>";
						
						$f=substr($r['room_id'],0,2);
					}
					$n++;
				}
				?>
							</div>
						</div>
					</div>
				</div>
				<div class='row' style='margin-bottom:10px;text-align:center;'>
					<button class='btt' onclick='window.location.href="manageservice.php"'>ยืนยัน</button>
				</div>
			</div> 
		</div>
	</div>

    <div style='z-index:100' class='footer-btn-group'>
		<div class='text-box-content clearfix text-center' style='background-color:transparent;'>
			<button onclick='modalAddRoomRate()' id='define' type='button' class='btn btn-water btn-lg' disabled>
				กำหนดค่าห้อง
	        </button>
		</div>
    </div>
    <div class='modal fade in' id='addRoomRate' style='display: none;'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' onclick='cl()'><span><i class='fa fa-times'></i> ปิด</span></button>
					<h2 class='modal-title'>แก้ไขค่าห้อง</h2>
				</div>
				<form class='ng-pristine ng-valid ng-valid-required' method='post' action=''>
					<div class='modal-body'>
						<p></p>
						<table class='table table-bordered'>
							<tbody>
								<tr>
									<td><strong>ค่าเช่าห้อง</strong> (บาท/เดือน)</td>
									<td>
										<input type='text' class='form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required' name='price' required='' value='0' onkeypress='CheckNum()' maxlength='5'>
									</td>
								</tr>
								<tr>
									<td><strong>ค่าเช่าเฟอร์นิเจอร์</strong> (บาท/เดือน)</td>
									<td>
										<input type='text' class='form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required' name='furniture' required='' value='0' onkeypress='CheckNum()' maxlength='4'>
									</td>
								</tr>
							</tbody>
						</table>
						<p></p>
							* ถ้าไม่มีให้กำหนดเป็น 0
					</div>
					<div class='modal-footer'>
						<button type='submit' class='btn btn-green'><i class='fa-spin ng-hide'></i> บันทึก</button>
					</div>
					<input type="text" id="hid" name="hid" hidden>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
var array=[];
$(function()
{
	$('#header').load('header.html');
	$('#arrow').load('arrow.html');
	var a = document.getElementsByClassName('choose');
	var define = document.getElementById("define");
	window.onclick=function()
	{
		if(a.length>0)
		{
			define.removeAttribute('disabled');
		}
		else
		{
			define.setAttribute('disabled',true);
		}
	}
});

function modalAddRoomRate()
{
	var form = document.getElementById('addRoomRate');
	form.style.display='block';
	window.onclick=function()
	{
		if(event.target==form)
		{
			form.style.display="none";
		}
	}
}
function cl()
{
	var a = document.getElementById('addRoomRate');
	a.style.display='none';
}
function CheckNum(){
	var a = event.keyCode;
		if (a!=8&a!=13&(a < 48 || a > 57)){
		      event.returnValue = false;
	    	}	
}
function selected(id)
{
	var div = document.getElementById(id);
	var hid = document.getElementById("hid");
	var define = document.getElementById("define");
	if(div.classList.contains("choose")==false)
	{
		div.classList.add("choose");
		if(!array.includes(id))
		{
			array.push(id);
			hid.value=array;
		}
	}
	else
	{
		div.classList.remove("choose");
		ind=array.indexOf(id);
		array.splice(ind,1);
		hid.value=array;
	}
}
function selectedAll(sf)
{
	var str = 'c'+sf;
	var c = document.getElementsByClassName(str);
	var hid = document.getElementById("hid");
	for(i=0;i<c.length;i++)
	{
		c[i].classList.add("choose");
		if(!array.includes(c[i].id))
		{
			array.push(c[i].id);
			hid.value=array;
		}
	}
//	var div = document.getElementById();
}
function deselectedAll(sf)
{
	var str = 'c'+sf;
	var c = document.getElementsByClassName(str);
	for(i=0;i<c.length;i++)
	{
		c[i].classList.remove("choose");
		if(array.includes(c[i].id))
		{	
			ind=array.indexOf(c[i].id);
			array.splice(ind,1);
			hid.value=array;
		}
	}
}
</script>
</body>
</html>