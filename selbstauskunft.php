<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	function isInRange($val, $startRange, $endRange) {
		if ($val >= $startRange && $val <= $endRange)
			return true;
		else
			return false;
	}

	function removeSpecialChars($text) {
		// Uppercase Range 65 - 90
		// Lowercase Range 97 - 122
		// numbers   Range 48 - 57
		$result = "";

		for ($i = 0; $i < strlen($text); $i++) {
			$char = ord($text[$i]);
			if (isInRange($char, 65, 90) || isInRange($char, 97, 122) || isInRange($char, 48, 57)) {
		    	$result = $result.chr($char);
		    }
		}
		return strtolower($result);
	}

	function getData($name) {
		if (isset($_POST[$name])) {
			$data = $_POST[$name];
			$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
			$data = str_replace(";", "", $data);
			$data = str_replace("\n", "-", $data);
			$data = str_replace("\r", "", $data);
			return $data;
		}
		return "";
	}

	function sendConfirmationEmail($mailAddr, $text) {
	    $header = "From:anmelden@dpsg-deggingen.de \r\n";
	    //$headers .= "Cc: testsite <mail@testsite.com>\n"; 
	    //$headers .= "X-Sender: testsite <mail@testsite.com>\n";
	    $header .= 'X-Mailer: PHP/' . phpversion();
	    $header .= "X-Priority: 1\n"; // Urgent message!
	    $header .= "Return-Path: anmelden@dpsg-deggingen.de\n"; // Return path for errors
	    $header .= "MIME-Version: 1.0\r\n";
	    $header .= "Content-Type: text/html; charset=utf-8\n";

        mail($mailAddr,"Erfolgreiche Anmeldung", $text, $header);
	}


	$ip = $_SERVER['REMOTE_ADDR'];
	$dateTime = date("Y-m-d H:i");

	$header = 	"Name;".
				"Vorname;".
				"Anschrift;".
				"Geburtsdatum;".
				"Funktion in der DPSG;".
				"Stamm;".
				"Bezirk;".
				"Diözese;".
				"Datum;".
				"IP";


	$dataSet = 	getData("nachname").";".
				getData("vorname").";".
				getData("anschrift").";".
				getData("geburtstag").";".
				getData("funktion_in_dpsg").";".
				getData("stamm").";".
				getData("bezirk").";".
				getData("dioezese").";".
				$dateTime.";".
				$ip;

	
	$fileName = "selbstauskunft";

	if ($fileName != "") {
		$fileName = "data/".$fileName.".csv";

		if (!file_exists($fileName)) {
			$myfile = fopen($fileName, "a");
			fwrite($myfile, $header."\n");
		} else {
			$myfile = fopen($fileName, "a");
		}
		
		if ($myfile) {
			fwrite($myfile, $dataSet."\n");
			fclose($myfile);
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  </script> 
	<script type="text/javascript" src="verify.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="formGroup">
		<h1>Selbstauskunft ausgefüllt</h1>
		<p>Dankeschön. Die Liste wird für die Aktion (Pfila, Stawo, ...) ausgedruckt und du musst dort dann unterschreiben :)
	</div>
</body>

</html>

