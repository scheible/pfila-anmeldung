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

	$kind = getData("kind");

	$illnessNo = getData("illnessNo");
	$illnessYes = getData("illnessYes");
	$illnessInfo = getData("illnessInfo");

	$allergyNo = getData("allergyNo");
	$allergyYes = getData("allergyYes");
	$allergyInfo = getData("allergyInfo");

	$pflaster = getData("pflaster");
	$pflasterAllergie = getData("pflasterAllergie");
	$bepanthen = getData("bepanthen");
	$zecken = getData("zecken");
	$zeckenArzt = getData("zeckenArzt");
	$wespenstich = getData("wespenstich");
	$spreisel = getData("spreisel");
	$tetanus = getData("tetanus");

	$swimNo = getData("swimNo");
	$swimYes = getData("swimYes");

	$vegetarian = getData("vegetarian");
	$vegan = getData("vegan");

	$phone = getData("phone");
	$mobile = getData("mobile");
	$email = getData("email");

	$theretripYes = getData("theretripYes");
	$theretripCount = getData("theretripCount");
	$returntripYes = getData("returntripYes");
	$returntripCount = getData("returntripCount");

	$accountHolder = getData("accountHolder");
	$institute = getData("institute");
	$iban = getData("iban");
	$bic = getData("bic");

	$bemerkung = getData("freieBemerkung");

	$day1 = getData("day0");
	$day2 = getData("day1");
	$day3 = getData("day2");
	$day4 = getData("day3");
	$day5 = getData("day4");
	$day6 = getData("day5");
	$day7 = getData("day6");
	$day8 = getData("day7");
	$day9 = getData("day8");
	$day10 = getData("day9");
	$day11 = getData("day10");
	$day12 = getData("day11");
	$day13 = getData("day12");
	$day14 = getData("day13");

	$action = getData("action");

	$ip = $_SERVER['REMOTE_ADDR'];
	$dateTime = date("Y-m-d H:i");


	$header = 	"Kind;".
				"Krankheit Nein;".
				"Krankheit Ja;".
				"Krankheit Info;".
				"Allergie Nein;".
				"Allergie Ja;".
				"Allergie Info;".
				"pflaster;". 
				"pflasterAllergie;".
				"bepanthen;".
				"zecken;".
				"zeckenArzt;".
				"wespenstich;".
				"spreisel;".
				"tetanus;".
				"Schwimmen Ja;".
				"Schwimmen Nein;".
				"Vegetarier Ja;".
				"Veganer Ja;".
				"Telefon Eltern;".
				"Handy Eltern;".
				"E-Mail Eltern;".
				"Hinfahrt Ja;".
				"Hinfahrt Plätze;".
				"Rückfahrt Ja;".
				"Rückfahrt Plätze;".
				"Kontoinhaber;".
				"Institut;".
				"IBAN;".
				"BIC;".
				"Bemerkung;".
				"Tag 1;".
				"Tag 2;".
				"Tag 3;".
				"Tag 4;".
				"Tag 5;".
				"Tag 6;".
				"Tag 7;".
				"Tag 8;".
				"Tag 9;".
				"Tag 10;".
				"Tag 11;".
				"Tag 12;".
				"Tag 13;".
				"Tag 14;".
				"Datum Anmeldung;".
				"IP";


	$dataSet = 	$kind.";".
				$illnessNo.";".
				$illnessYes.";".
				$illnessInfo.";".
				$allergyNo.";".
				$allergyYes.";".
				$allergyInfo.";".
				$pflaster.";".
				$pflasterAllergie.";".
				$bepanthen.";".
				$zecken.";".
				$zeckenArzt.";".
				$wespenstich.";".
				$spreisel.";".
				$tetanus.";".
				$swimNo.";".
				$swimYes.";".
				$vegetarian.";".
				$vegan.";".
				$phone.";".
				$mobile.";".
				$email.";".
				$theretripYes.";".
				$theretripCount.";".
				$returntripYes.";".
				$returntripCount.";".
				$accountHolder.";".
				$institute.";".
				$iban.";".
				$bic.";".
				$bemerkung.";".
				$participateOnDays.";". 
				$day2.";". 
				$day3.";". 
				$day4.";". 
				$day5.";". 
				$day6.";". 
				$day7.";". 
				$day8.";". 
				$day9.";". 
				$day10.";".
				$day11.";".
				$day12.";".
				$day13.";".
				$day14.";".
				$dateTime.";".
				$ip;

	$confMail = "Hallo,<br><br> ".$kind." wurde erfolgreich zu ".$action." angemeldet. <br><br>Viele Grüße, das Rover und Leiter Team der Degginger Pfadis";

	
	$fileName = removeSpecialChars($action);

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
			//sendConfirmationEmail($email, $confMail);
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
		<h1>Anmeldung erfolgreich</h1>
		<p><?php echo $kind; ?> wurde erfolgreich für <?php echo $action; ?> angemeldet.</p>
		<?php
			if ($email != "") {
				echo "<p>Eine Anmeldebestätigung wurde an ".$email." versendet</p>";
			} else {
				echo "<p>Du hast keine E-Mail Adresse angegeben. Daher wurde keine Anmeldebestätigung versandt, deine Anmeldung ist aber trotzdem angekommen</p>";
			}
		?>
		<input type="button" value="Weiteres Kind anmelden" onclick="history.back();">
	</div>
</body>

</html>

