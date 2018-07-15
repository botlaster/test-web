<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php $a = '100';//ตัวแปร php?>

<script type="text/javascript">
   x = <?php json_encode($a);?>;
   x = x*100;
   $.post('test.php',{data:x});
   <meta http-equiv="refresh" content="0:url='test.php'"/>
</script>

<body>
</body>
</html>