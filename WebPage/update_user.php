<?php

$id = intval($_REQUEST['id']);
$date = htmlspecialchars($_REQUEST['date']);
$rmd = htmlspecialchars($_REQUEST['rmd']);


include 'conn.php';

$sql = "update users set date='$date',rmd='$rmd' where id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'date' => $date,
		'rmd' => $rmd,
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>