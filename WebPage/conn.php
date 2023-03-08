<?php

$conn = @mysql_connect('127.0.0.1','root','landis');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
$db_connection = mysqli_connect('127.0.0.1','root','landis','DEVELOPERS');
mysql_select_db('DEVELOPERS', $conn);
?>