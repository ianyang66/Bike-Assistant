<?php
// �إ� MySQL ��Ʈw���s�u
$connection = @mysql_connect('127.0.0.1','root','landis');
if (!$connection) {
	die('Could not connect: ' . mysql_error());
}
// �]�w�b�Τ�ݨϥ�UTF-8���r����
mysql_set_charset('utf8', $connection);
?>