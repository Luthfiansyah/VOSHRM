<?php

	$subject = "Welcome to VOSHRM - Basic";
	$email_from = "noreply@voshrm.com";
    $full_name = "noreply";
    $from_mail = $full_name.'<'.$email_from.'>';
	$headers = "From: ".$from_mail."\r\n"."X-Mailer: PHP/".phpversion();

	$link = mysql_connect('localhost', 'sa', 'sa');
	$server_path = "http://#";

	if (!$link) {
	    die('Not connected : ' . mysql_error());
	}

	$db_selected = mysql_select_db('wp_cross_database', $link);

	if (!$db_selected) {
	    die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM applications WHERE application_status = 'Pending' /*AND product_type = 'Basic'*/";
	$result = mysql_query($query,$link);

	function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
	    @mkdir($dst); 
	    while(false !== ( $file = readdir($dir)) ) { 
	        if (( $file != '.' ) && ( $file != '..' )) { 
	            if ( is_dir($src . '/' . $file) ) { 
	                recurse_copy($src . '/' . $file,$dst . '/' . $file);
	            } 
	            else { 
	                copy($src . '/' . $file,$dst . '/' . $file); 
	            } 
	        } 
	    } 
	    closedir($dir); 
	} 


	if(!$result){
		print mysql_error();
	} else {
		while($row = mysql_fetch_object($result)){
			$id = $row->id;
			$company_name = strtolower(str_replace(' ', '-', $row->company_name));
			$person_name = $row->person_name;
			$person_email = $row->person_email;
			$person_contact = $row->person_contact;
			$product_type = $row->product_type;
			$message = $row->message;
			$application_route = $row->application_route;
			$application_database = $row->application_database;
			$application_status = $row->application_status;
			$body = @
"Hi, ".$person_name." from ".$row->company_name.",

	Thank you for applying our product. Using our product means you are agree with our terms and services. Are you ready to leave your old way of working behind, and embark on an automated adventure that’s free of spreadsheets, sticky notes and outdated software?if so, Please visit the following link to access your own HRMS: http://hrm.southeastasia.cloudapp.azure.com/".$company_name;
			$er_email = mail($person_email, $subject, $body, $headers);
			if(!$er_email){
				die("Mail Error!!".mysql_error());
			}
			// $queryCreateDB = "CREATE DATABASE IF NOT EXISTS ".$company_name;
			// $resultCreateDB = mysql_query($queryCreateDB,$link);
			// if(!$resultCreateDB){
			// 	print mysql_error();
			// }else {
				// $dstfile='C:/xampp/htdocs/'.$company_name;
				// $resultCreateDir = mkdir(dirname($dstfile), 0777, true);

				// if($resultCreateDir == true){
					//$resultClone =;
				if(!is_dir($company_name)){
					recurse_copy('VOSHRM-LTS',$company_name);
				}

				$queryUpdateDB = "UPDATE applications SET application_status = 'Published', application_route = '". $server_path."',application_database = '". $company_name."' WHERE id = ".$id."";
				$resultUpdateDB = mysql_query($queryUpdateDB,$link);
				if(!$resultUpdateDB){
					print mysql_error();
				}
				// }
			// }
		}
	}
?>
