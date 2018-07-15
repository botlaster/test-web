<?php
if(isset($_POST['dash_new_shout_textarea']))
{
	echo $_POST['dash_new_shout_textarea']."5555555555";
}
?>
<form action="" method="post">
<div id="dash_new_shout_textarea">gggg</div>
<input type="hidden" name="dash_new_shout_textarea" id="dash_new_shout_textarea_hidden" />
<input type="submit" onclick="setInterval();">
</form>
<script type="text/javascript">
setInterval(function () {
  document.getElementById("dash_new_shout_textarea_hidden").value = document.getElementById("dash_new_shout_textarea").innerHTML;
}, 5);
</script>	