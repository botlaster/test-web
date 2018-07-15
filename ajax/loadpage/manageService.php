<?php
include_once "class/class.php";
$obj=new useclass();
$obj->checkLogin();
if(isset($_POST['sm1'])&&trim($_POST['service_name'])!="")
{
	$service_name=$_POST['service_name'];
	$obj->addFacility($service_name);
	header("location:manageService.php");
}
else if(isset($_POST['sm2'])&&trim($_POST['service_price'])!="")
{
	$service_price=$_POST['service_price'];
	$facility_id=$_POST['facility_id'];
	$str="select * from tb_service_fee where facility_id='$facility_id' and building_id='".$_SESSION['building_id']."'";
	$query=$obj->query($str);
	$num=$obj->num_rows($query);
	if($num>0)
	{	
		$r=mysqli_fetch_array($query);
		$obj->updateServiceFee($r['service_id'],$service_price);
		header("location:manageService.php");
	}	
	else if($num==0)
	{
		$obj->addServiceFee($facility_id,$service_price,$_SESSION['building_id']);
		header("location:manageService.php");
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Config Services Rate</title>
<link rel='stylesheet' href='files/font-awesome.min.css'>
<link rel='stylesheet' href='files/bootstrap.min.css'>
<link rel='stylesheet' href='files/main.min.css'>
<link rel='stylesheet' href='css/manageservice.css'>
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
<style>
</style>
</head>
<body style='background-color: rgb(234, 234, 234);'>
<div id='header'></div>
<div id='arrow'></div>
<div class='container' style='padding:10px'>
	<div class='text-box-content text-center clearfix'>
		<img src='images/banner-service.jpg' class='img-responsive'>
	</div>
	<div class='text-box-content clearfix'>
		<div class='heading clearfix'>
			<h2>
				ค่าบริการ
			</h2>
		</div>
		<div class='content clearfix'>
			<div class="col-xs-6 col-sm-5ths text-center" style="cursor:pointer">
				<div class="room-div not-set" style="margin-top:10px">
					<div class="room-div-inner" onclick="addFacility()">
						<div class="text-middle" style="bottom:20%">
							<i class="fa fa-plus fa-2x"></i><br>เพิ่มบริการ
						</div>
					</div>
				</div>
            </div>
			<?php
			$str="select * from tb_facility";
			$query=$obj->query($str);
			while($r=mysqli_fetch_array($query))
			{
				if($r['name']!="el"&&$r['name']!="wa")
				{
					$str2="select * from tb_facility inner join tb_service_fee on tb_facility.facility_id=tb_service_fee.facility_id where tb_facility.facility_id='".$r['facility_id']."' and building_id='".$_SESSION['building_id']."'";
					$query2=$obj->query($str2);
					$r2=mysqli_fetch_array($query2);
					$r2=($r2!='')?$r2['price']:'';
					echo "
					<div class='col-xs-6 col-sm-5ths text-center' style='cursor:pointer'>
						<div class='room-div service' style='margin-top:10px'>
							<div class='room-div-inner'>
								<img class='room-user' style='padding:10px' src='images/banner-service2.png' onclick='modalAddServiceRate(\"".$r['facility_id']."\",\"".$r['name']."\")'>
								<div class='text-top'>
									<span>".$r['name']."</span>
								</div>
								<div class='text-bottom'>
									<span>".$r2."</span>
								</div>
							</div>
						</div>
					</div>";
				}
				
			}
			?>

		</div>
		<div class="row text-center">
			<button class='btt'>Submit</button>
		</div>
	</div>
	<div style='z-index:100' class='footer-btn-group'>
		<div class='text-box-content clearfix text-center' style='background-color:transparent;'>
			<button onclick='modalAddServiceRate()' id='define' type='button' class='btn btn-water btn-lg' disabled>
				กำหนดค่าบริการ
	        </button>
		</div>
    </div>
	<form class='ng-pristine ng-valid ng-valid-required' method='post' action=''>
	<!-- เพิ่มชื่อ facility -->
		<div class='modal fade in' id='addServiceName' style='display: none;'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' onclick='cl()'><span><i class='fa fa-times'></i> ปิด</span></button>
						<h2 class='modal-title'>เพิ่มชื่อบริการ</h2>
					</div>
					<div class='modal-body'>
						<p></p>
						<table class='table table-bordered'>
							<tbody>
								<tr>
									<td><strong>ชื่อ</strong></td>
									<td>
										<input type='text' class='form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required' name='service_name' maxlength='30' autofocus required>
									</td>
								</tr>
							</tbody>
						</table>
						<p></p>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='sm1' class='btn btn-green'><i class='fa-spin ng-hide'></i> บันทึก</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<form class='ng-pristine ng-valid ng-valid-required' method='post' action=''> 
	<!-- div เพิ่มราคาให้ชื่อ -->
		<div class='modal fade in' id='addServiceRate' style='display: none;'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' onclick='cl()'><span><i class='fa fa-times'></i> ปิด</span></button>
						<h2 class='modal-title' style="display:inline">ชื่อบริการ <h2 id="nameService" style="display:inline"></h2></h2>
					</div>
					<div class='modal-body'>
						<p></p>
						<table class='table table-bordered'>
							<tbody>
								<tr>
									<td>กำหนดราคา</td>
									<td>
										<input type='text' class='form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required' name='service_price' autofocus required onkeypress='CheckNum()' maxlength='4'>
										<input type='text' name='facility_id' id='facility_id' hidden>
									</td>
								</tr>
							</tbody>
						</table>
						<p></p>
					</div>
					<div class='modal-footer'>
						<button type='submit' name='sm2' class='btn btn-green'><i class='fa-spin ng-hide'></i> บันทึก</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
var array=[];
$(function()
{
	$('#header').load('header.html');
	$('#arrow').load('arrow.html');
});
function addFacility()
{
	var form = document.getElementById("addServiceName");
	form.style.display="block";
	window.onclick=function()
	{
		if(event.target==form)
		{
			form.style.display="none";
		}
	}
}
function modalAddServiceRate(id,n)
{
	var form = document.getElementById("addServiceRate");
	var nameService = document.getElementById("nameService");
	var hid = document.getElementById('facility_id');
	hid.setAttribute("value",id);
	nameService.innerHTML=n;
	form.style.display="block";
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
	var form = document.getElementById("addServiceName");
	var form2 = document.getElementById("addServiceRate");
	form.style.display="none";
	form2.style.display="none";
}
function CheckNum(){
	var a = event.keyCode;
		if (a!=8&a!=13&(a < 48 || a > 57)){
		      event.returnValue = false;
	    	}	
}
</script>
</body>
</html>