<form name="search_field" id="search_field" action="" method="post" >
 <?php if(!$_POST == ''){ ?>
<ul>
<li><input type="checkbox" <?php if(in_array("mon", $_POST['day'])) {?> checked="checked"<?php } ?> name="day[]" value="mon"/>Monday</li>
 <li><input type="checkbox" <?php if(in_array("tue", $_POST['day'])) {?> checked="checked"<?php } ?> name="day[]" value="tue"/>Tueday</li>
            <li><input type="checkbox" <?php if(in_array("wed", $_POST['day'])) {?> checked="checked"<?php } ?> name="day[]" value="wed"/>Wednesday</li>
            <li><input type="checkbox" <?php if(in_array("thr", $_POST['day'])) {?> checked="checked"<?php } ?> name="day[]" value="thr"/>Thursday</li>
            <li><input type="checkbox" <?php if(in_array("fri", $_POST['day'])) {?> checked="checked"<?php } ?> name="day[]" value="fri"/>Friday</li>
            <li><input type="checkbox" <?php if(in_array("sat", $_POST['day'])) {?> checked="checked"<?php } ?> name="day[]" value="sat"/>Saturday</li>
            <li><input type="checkbox" <?php if(in_array("sun", $_POST['day'])) {?> checked="checked"<?php } ?> name="day[]" value="sun"/>Sunday</li>
</ul>
<input type="submit" id="submit" name="submit"  />
</form>
<?php
print_r($_POST);
?>
<?php } else { ?>


 <form name="search_field" id="search_field" action="formpage.php" method="post" >
<ul>
			<li><input type="checkbox" name="day[]" value="mon"/>Monday</li>
 			<li><input type="checkbox"  name="day[]" value="tue"/>Tueday</li>
            <li><input type="checkbox" name="day[]" value="wed"/>Wednesday</li>
            <li><input type="checkbox" name="day[]" value="thr"/>Thursday</li>
            <li><input type="checkbox" name="day[]" value="fri"/>Friday</li>
            <li><input type="checkbox" name="day[]" value="sat"/>Saturday</li>
            <li><input type="checkbox" name="day[]" value="sun"/>Sunday</li>
</ul>
<input type="submit" id="submit" name="submit"  />
</form>



<?php } ?>