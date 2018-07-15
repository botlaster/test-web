<!DOCTYPE html>
<html>
<head>
<script src="js/js.js"></script>
<style>
body
{
	font-size:20px;
}
</style>
</head>
<body>
<div>
<?php echo date(DATE_RFC822); ?></div>
<form onsubmit="return false">
<input type="text" name="name" id="name" onkeyup="ac()" placeholder="Your Name..">
<input type="text" name="sur" id="sur" onkeyup="ac()" placeholder="Your Surname..">
<input type="submit" name="sm" onclick="ac()" value="Submit">
</form>
<div id="result"></div>
<div>asdf</div>
<script>
function ac()
{
	var name = document.getElementById('name').value;
	var sur = document.getElementById('sur').value;
	$.post('data.php',{name:name,sur:sur},
	function(data)
	{
		$('#result').html(data);
	});
}
</script>
</body>
</html>
