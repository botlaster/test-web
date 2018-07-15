<?php
session_start();

$_SESSION['abc']='123';
?>
<form action="abc.php" method="post">
<input type="text" name="test"/>
<input type="submit">
</form>