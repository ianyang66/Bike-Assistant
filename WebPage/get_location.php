<?php
// Root file for API - Handles incoming data from Arduino

// Establish a connection to database
//include("database.php");
	include('conn.php');
    // Check that device corresponding to device_id aka MAC-address is found from database
	$result = mysqli_query($db_connection,"SELECT * FROM gps WHERE id = '1'");
	
	while($row = mysqli_fetch_array($result))
	{
		return $row['id'];
		return $row['date_and_time'];
		$str=$row['latitude'];
		return $str;
		return $row['longitude'];
				

	}
	mysqli_close($db_connection);
?>
<?php $aaa = '111';?>
<script type="text/javascript">
var aaa = <?php echo $aaa;?>;
</script>