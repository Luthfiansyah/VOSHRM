<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "wp_cross_database";
	$dbname2 = "vos_demo";
	$subject = "Request for DEMO";
	$email_from = "noreply@voshrm.com";
    $full_name = "noreply";
    $from_mail = $full_name.'<'.$email_from.'>';
    #$from = $from_mail;
    #$headers = "From: ".$from."\r\n"."Mailed-by: voshrm.com"."\r\n"."Signed-by: voshrm.com"."\r\n". //"Reply-To: "."\r\n".
    #           "X-Mailer: PHP/".phpversion();
    #$headers .= 'MIME-Version: 1.0' . "\r\n";
    #$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
	$headers = "From: ".$from_mail."\r\n"."X-Mailer: PHP/".phpversion();

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: ".mysql_error);
	}
	
	// Check database
	if (!mysql_select_db($dbname, $conn)) {
		die("Could not select database");
	}

	// Select query
	$sql = "SELECT * FROM auto_reply_contact where status=0";
	$result = mysql_query($sql, $conn);
	if (!$result) {
		echo "0 results\n";
		echo 'MySQL Error: ' . mysql_error();
	}else{
		while($row = mysql_fetch_assoc($result)) {
			$nama = $row['person_name'];
			$comp = $row['company_name'];
			$mail = $row['person_email'];
			$id = $row['ID'];
			// Reset Connection
			if (!mysql_select_db($dbname2, $conn)) {
				echo 'Could not select database';
			}
			$sql = "SELECT id, user_name FROM ohrm_user";
			$result1 = mysql_query($sql, $conn);
			if (!$result1) {
				echo "0 results\n";
				echo 'MySQL Error: ' . mysql_error();
			}
			while($row = mysql_fetch_assoc($result1)) {
				$id_user = $row['id'];
				$user_name[$id_user-1] = $row['user_name'];
				$user_pass[$id_user-1] = $row['user_name'].strval(date("d")+1);
			}
			$body = @
"Hi, ".$nama." from ".$comp."

	Thank you for applying our product. Our customer service will be contacting you short. Are you ready to leave your old way of working behind, and embark on an automated adventure that's free of spreadsheets, sticky notes and outdated software? If so, simply visit the following link to get going: http://hrm.southeastasia.cloudapp.azure.com/vos.demo

Admin role
Username : ".$user_name[0]."
Password : ".$user_pass[0]."

Supervisor role
Username : ".$user_name[1]."
Password : ".$user_pass[1]."

User role
Username : ".$user_name[2]."
Password : ".$user_pass[2];
			$er_email = mail($mail, $subject, $body, $headers);
			if(!$er_email){
				echo "Mail Error!!".mysql_error();
			}else{
				if (!mysql_select_db($dbname, $conn)) {
					echo 'Could not select database';
				}
				mysql_query("UPDATE auto_reply_contact SET status=true where ID='$id'", $conn);
			}
		}
	}
	mysql_close();
?>