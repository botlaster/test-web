<?php 
session_start();
class useclass
{
	private $host="localhost";
	private $root="root";
	private $pw="";
	private $db_name="ba";
	private $charset = "UTF8";
	private $rs;
	private $con;
	public function useclass()
	{
		$this->con=mysqli_connect($this->host,$this->root,$this->pw,$this->db_name);
		$con2=mysqli_set_charset($this->con,$this->charset);
	}
	public function __destruct()
	{
		mysqli_close($this->con);
	}
	public function query($strsql)
	{
		//$rs=$this->con;
		//return $this->rs=$rs->query($strsql);
		return $this->rs=mysqli_query($this->con,$strsql);
		//var_dump($this->rs);
	}
	public function num_rows()
	{
		return mysqli_num_rows($this->rs);
	}
	public function direct($url)
	{
		echo "<meta http-equiv='refresh' content='0;url=".$url."'>";
	}
	public function alert($message)
	{
		echo "<script>alert('".$message."')</script>";
	}
	public function signup()
	{
		if(isset($_POST['signup']))
		{
			$user_id=$_POST['user_id'];
			$pw=$_POST['pw'];
			$name=ucfirst(strtolower(trim($_POST['name'])))." ".ucfirst(strtolower(trim($_POST['surname'])));
			$tel=$_POST['tel'];
			$building_name=ucfirst(strtolower($_POST['building_name']));
			$building_address=ucfirst($_POST['building_address']);
			$email=$_POST['email'];
			$filUpload=$_FILES['filUpload'];
			$str=substr_replace(dirname(__FILE__),"",-5);
			$dir=$str."\\admin\\business\\".time()."_".$_FILES['filUpload']['name'];
			$sql="select * from tb_user where user_id='".$user_id."'";
			$query=$this->query($sql);
			$r=mysqli_fetch_array($query);
			if($r)
			{
				$this->alert("Username นี้ถูกใช้แล้ว");
				$this->direct("login.php");
			}
			else
			{
				if(move_uploaded_file($_FILES['filUpload']['tmp_name'],$dir))
				{
					$sql="insert into tb_user(user_id,pw,name,tel,building_name,building_address,email,image) values('".$user_id."','".$pw."','".$name."','".$tel."','".$building_name."','".$building_address."','".$email."','".time()."_".$_FILES['filUpload']['name']."')";
					$query=$this->query($sql);
					if($query)
					{
						$this->alert("คุณได้สมัครเรียบร้อยแล้ว กรุณารอการยืนยันการสมัครจาก Admin ทาง Email จะตอบกลับภายใน 1 วันทำการ");
						$this->direct("login.php");
					}
				}
			}
		}
	}
	public function login()
	{
		if(isset($_POST['login']))
		{
			$id=$_POST['id'];
			$pw=$_POST['pw'];
			$sql="select * from tb_user where user_id='".$id."' and pw='".$pw."'";
			$query=$this->query($sql);
			$r=mysqli_fetch_array($query);
			if(!$r)
			{
				$this->alert('ID Or Password Incorrect');
				$this->direct("login.php");
			}
			else
			{	

				$_SESSION['user_id']=$r['user_id'];
				$_SESSION['status']=$r['status'];
				if($_SESSION['status']=="0")
				{
					$this->direct("admin/index.php");
				}
				else if($_SESSION['status']=="1")
				{
					$this->alert('กรุณารอการยืนยันการสมัครจาก Admin');
					$this->direct("login.php");
				}
				else if($_SESSION['status']=="2")
				{
					$this->direct('index.php');
				}
			}
		}
	}
	public function del($value,$image)
	{
		$sql="delete from tb_user where user_id='".$value."'";
		$query=$this->query($sql);
		if($query)
		{
			@unlink("business/".$image);
			$this->direct('index.php');
			
		}
		else
		{
			$this->alert('ไม่สามารถลยได้');
			$this->direct('index.php');
		}
	}
	public function conf($value)
	{
		$sql="update tb_user set status='2' where user_id='".$value."'";
		$query=$this->query($sql);
		if($query)
		{
			$this->direct('index.php');
		}
		else
		{
			$this->alert('อนุมัติไม่ได้');
			$this->direct('index.php');
		}
	}
	public function addapartment($user_id,$building_name,$building_address,$recognizance,$specificationp)
	{
		$sql="insert into tb_build(user_id,building_name,building_address,recognizance,specificationp)values('$user_id','$building_name','$building_address','$recognizance','$specificationp')";
		if($this->query($sql))
		{
			
		}
	}
	public function addroom($room_id,$building_id,$name)
	{
		$sql="insert into tb_rooms(room_id,building_id,name)values('$room_id','$building_id','$name')";
		$query=$this->query($sql);
	}
	public function setMoney($room_id,$building_id,$price,$fur)
	{
		$sql="update tb_rooms set price='$price',furniture='$fur' where room_id='$room_id' and building_id='$building_id'";
		if($this->query($sql))
		{
			include_once "page3.php";
		}
	}
	public function addFacility($name)
	{
		$sql="select * from tb_facility where name='$name'";
		$query=$this->query($sql);
		$r=mysqli_fetch_array($query);
		if($r)
		{
			return $r['facility_id'];
		}
		else
		{
			$sql="insert into tb_facility(name) values('$name')";
			$query=$this->query($sql);
			if($query)
			{
				$sql="select * from tb_facility where name='$name'";
				$query=$this->query($sql);
				$r=mysqli_fetch_array($query);
				if($r)
				{
					return $r['facility_id'];
					include "success.html";
				}
			}
		}
	}
	public function addServiceFee($facility_id,$price,$building_id)
	{
		$sql="insert into tb_service_fee(facility_id,price,building_id)values('$facility_id','$price','$building_id')";
		$query=$this->query($sql);
	}
	public function updateServiceFee($service_id,$price)
	{
		$sql="update tb_service_fee set price='$price' where service_id='$service_id'";
		$query=$this->query($sql);
	}
	public function checkLogin()
	{
		if(empty($_SESSION['user_id']))
		{
			$this->direct('login.php');
		}
	}
	public function checkRooms()
	{
		$sql="select * from tb_rooms where building_id='".$_SESSION['building_id']."'";
		$query=$this->query($sql);
		$r=mysqli_fetch_array($query);
		$row=$this->num_rows($r);
		if($row==0)
		{
			$this->direct('manageRoom.php');
		}
	}
	public function checkAll()
	{
		$this->checkLogin();
		$this->checkRooms();
	}
}