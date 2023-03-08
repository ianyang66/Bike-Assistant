<?php
// Root file for API - Handles incoming data from Arduino

// Establish a connection to database
//include("database.php");
	include('conn.php');
    // Check that device corresponding to device_id aka MAC-address is found from database
	$result = mysqli_query($db_connection,"SELECT * FROM gps ORDER BY id DESC LIMIT 1");

	while($row = mysqli_fetch_array($result))
	{
    $lati=$row['latitude'];
    $long=$row['longitude'];		
	}
	mysqli_close($db_connection);
?>
<script type="text/javascript">
var lati = <?php echo $lati;?>;
var long = <?php echo $long;?>;
</script>   
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    
    <title>Map at a specified location</title>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <link rel="stylesheet" type="text/css" href="heretry.css" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" type="text/css" href="../template.css" />
    <script type="text/javascript" src='../test-credentials.js'></script>    
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
  <script>window.ENV_VARIABLE = 'developer.here.com'</script><script src='../iframeheight.js'></script></head>
  <body id="markers-on-the-map">
    <div class="page-header">
        <h1>智慧單車助理</h1>
        <p>Map of your bike.</p>
    </div>
    <!--<p>This example displays a movable map initially centered on the <b>Brandenburg Gate</b> in the centre of Berlin <i></i></p>-->
    <div id="map"></div>
    
    <!--
    <h3>Code</h3>
    <p>
        The <code>map.setCenter()</code> method and <code>map.setZoom() </code>method are able to control the location of the map.<br>
    </p>
  -->
  
    <script type="text/javascript" src='Javascript/heretry.js'></script>
  
  </body>
</html>