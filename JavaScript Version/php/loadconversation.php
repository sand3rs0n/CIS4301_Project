#!/usr/local/bin/php
<?php
	include_once "config_def.php";
	session_start();

	$conn = pg_connect(CONNECTIONINFO);

	if (!$conn) {
		echo "Connection failed";
		exit;
	}	
	
	$friendname = $_POST['friendname'];
	$username = $_SESSION['username'];

	$query = "SELECT picPath FROM pictures WHERE picID = (SELECT getpicidfromConversation('".$username."', '".$friendname."'))";
	$result = pg_query($conn, $query);
	$row = pg_fetch_row($result);
	echo $row[0];
?>
