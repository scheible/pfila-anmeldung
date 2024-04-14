<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	echo "File Name: ";
	echo $_SERVER['SCRIPT_FILENAME'];


	
	$fileName = "test.txt";
	$file = fopen($fileName, "a");

	if ( $file ) {
		fwrite($file, "test");
		fclose($file);
	} else {
		echo "failed to open/create file\n";
	}


	//mail( to, subject, message, headers, parameters );
	mail("patrikscheible@posteo.net","test from php", "hallo welt");
?>