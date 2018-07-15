<?php
$result = array(
	array('emp_no' => 1001, 'first_name' => 'Kongthap','last_name'=>'Thammachat');
	array('emp_no' => 1002, 'first_name' => 'Mike', 'ast_name' => 'Piromporn'));
	$json=json_encode($result);
	echo $json;