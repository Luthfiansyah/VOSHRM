<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "vos_demo";
	
	// Create connection
	$conn = mysql_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
		die("Connection failed: ".mysql_error);
	}
	
	// Check database
	if (!mysql_select_db($dbname, $conn)) {
		echo 'Could not select database';
	}

	// Select query
	$sql = "SELECT id, user_name FROM ohrm_user";
	$result = mysql_query($sql, $conn);
	if (!$result) {
		echo "0 results\n";
		echo 'MySQL Error: ' . mysql_error();
	}
	
	// Change password
	while($row = mysql_fetch_assoc($result)) {
		$passChange = $row['user_name'].strval(date("d")+1);   // username + (date now + 1)
		$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);   // algorithm for the salt
		$passEncrypted = crypt($passChange, '$2a$12$'.$salt);
		$id = $row['id'];
		mysql_query("UPDATE ohrm_user SET user_password='$passEncrypted' where id='$id'", $conn);
	}
	mysql_close();
?>