<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript">
	function sayHello55() {
		document.write("Hello World");
	}
	</script>
<style> 

div {
    width: 5%;
    height: 100px;
    background: black;
    -webkit-transition: width 2s,height 4s;;
	-webkit-transition-duration: 2s;
	-webkit-transition-delay: 0.2s; /* For Safari 3.1 to 6.0 */
    transition: width 2s,height 4s;
	transition-duration: 2s;
	transition-delay: 0.2s;
}

div:hover {
    width: 100%;
	height: 500px;
}
</style>
</head>

<body>

<div></div>
<input type="button" onclick="sayHello55()" value="Say Hello" />

</body>
</html>