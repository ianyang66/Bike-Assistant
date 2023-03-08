<?php

$date = htmlspecialchars($_REQUEST['date']);
$rmd = htmlspecialchars($_REQUEST['rmd']);

include 'conn.php';


	$sql = "insert into users(date,rmd) values('$date','$rmd')";
	$result = @mysql_query($sql);
	if ($result){
		echo json_encode(array(
			'id' => mysql_insert_id(),
			'date' => $date,
			'rmd' => $rmd,
		));
	} else {
		echo json_encode(array('errorMsg'=>'Some errors occured.'));
	}

?>