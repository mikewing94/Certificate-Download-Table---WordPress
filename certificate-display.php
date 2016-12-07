<?php

	global $wpdb;
	$uid = $_GET['uid'];

	$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM `wp_certdatabase` WHERE userid = ".$uid.";"));

	echo"<div id='resultsdiv'>";
	echo "<table id='resultstable'>";
	echo "<tr>";
	echo "<td>Certificate Download</td>";
	echo "<td>Certificate Type</td>";
	echo "<td>Date Achieved</td>";
	echo "<td>Expiry Date</td>";
	echo "</tr>";

	foreach($result as $db){
	$fname = $db->filename;
	$ctype = $db->cert_type;
	$date = $db->date;
	$edate = $db->expiry_date;
	$nulldate = "1970-01-01";

	echo "<tr>";
	echo "<td><a href='/upload/certificates/".$fname."'>".$fname."</a></td>";
	echo "<td>".$ctype."</td>";
	echo "<td>";
	if ($date == $nulldate) { echo "N/A"; } else { echo $date;}
	echo "</td>";
	echo "<td>";
	if ($edate == $nulldate) { echo "N/A"; } else { echo $edate;}
	echo "</td>";
	echo "</tr>";
	}
	echo "</table>";
?>
