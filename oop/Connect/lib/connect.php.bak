<?php
class Class_Db
{
	private $host="localhost";
	private $root="root";
	private $pw="";
	private $db_name="wb";
	private $charset = "UTF8";
	private $rs;
	private $con;
	public function __construct()
	{
		$this->con=mysqli_connect($this->host,$this->root,$this->pw,$this->db_name);
		$con2=mysqli_set_charset($this->con,$this->charset);
		//$con2=mysqli_query($this->con,"SET NAME UTF8");
		if(!$this->con && !$con2)
		{
			echo "Disconnect DB";
		}
		else
		{
			echo "Connected<br>";
		}
	}
	public function query($strsql)
	{
		return $this->rs=mysqli_query($this->con,$strsql);
		//var_dump(mysqli_query($this->con,$strsql));
	}
	public function num_rows()
	{
		return mysqli_num_rows($this->rs);
	}
	public function fetch_array()
	{
		
	}
}
?>