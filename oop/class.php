<?php
class myClass
{
	static private $staticv;
	public static $sta="this static--";
	const sta="sta is const";
	public $name="Every body";
	public $myAttr = "!!myAttr.";
	private $myAttr2 = "!!myAttr2.";
	protected $myAttr3 = "!!myAttr3.";
	const myConst="Const.";
	public static function Main($name)
	{
		echo $name;
	}
	public static function Main2()
	{
		echo myClass::$sta;
	}
	public function myEcho(){
		echo "Hello World.<br>";
	}
	public function sayhi()
	{
		echo "Hi"." ".$this->name."<Br>".$this->conti();
	}
	public function conti()
	{
		echo "<br>This Con ";
	}
	public function __Construct()
	{
		echo "Start".$this->conti();
	}
	public function __Destruct()
	{
		echo "<br>End";
	}
	public function sta($value)
	{
		if($value != "")
		{
			self::$staticv = $value;
		}
		else 
		{
			self::$staticv = "null";
		}
		$this->getsta();
	}
	public function getsta()
	{
		echo self::$staticv."<BR>";
	}
}

class myClass2 extends myClass
{
	static private $staticv;
	public function __construct()
	{
		echo "Start2";
	}
	public function __destruct()
	{
		echo "End2".$this->myAttr3;
	}
	public function parents()
	{
		parent::__destruct();
	}
}

interface test
{
	public function md_1();
}

interface test2
{
	public function md_2();
}

class child implements test, test2
{
	public function md_1()
	{
		return "md_1";
	}
	public function md_2()
	{
		return "md_2"; 
	}
	public function myEcho()
	{
		echo self::md_1()." : ".self::md_2()."<br>";
	}
}
class testt
{
	private $age="<BR> My Age : 20 <BR>";
	public function a()
	{
		echo "hi".$this->b();
	}
	public function b()
	{
		return $this->age="<BR> My Age : 30 <BR>";
	}
	public function c()
	{
		echo $this->age;
	}
}
?>