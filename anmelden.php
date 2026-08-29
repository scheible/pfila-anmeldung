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

        $success = mail($mailAddr,"Erfolgreiche Anmeldung", $text, $header);
		return $success;
	}


	function updateCsvWithPost($csvFile, array $postData){
		// CSV einlesen
		$rows = file_exists($csvFile)
			? array_map(fn($line) => str_getcsv($line, ';', '"', '\\'), file($csvFile))
			: [];

		// Header bestimmen oder neu anlegen
		$columns = $rows[0] ?? [];

		// Schritt 1: POST-Feldnamen validieren und neue Spalten ergänzen
		foreach ($postData as $key => $value) {

			// Feldname validieren
			if (!preg_match('/^[a-zA-Z0-9_]{1,50}$/', $key)) {
				continue;
			}

			// Neue Spalte anlegen
			if (!in_array($key, $columns)) {
				$columns[] = $key;

				// Bestehende Zeilen erweitern
				foreach ($rows as &$row) {
					while (count($row) < count($columns)) {
						$row[] = '';
					}
				}
			}
		}

		// Schritt 2: Neue Zeile erzeugen
		$newRow = [];

		foreach ($columns as $col) {
			if (isset($postData[$col])) {
				$value = trim($postData[$col]);

				// CSV-Formula-Injection verhindern
				if (preg_match('/^[=\+\-@]/', $value)) {
					$value = "'" . $value;
				}

				$newRow[] = $value;
			} else {
				$newRow[] = '';
			}
		}

		// Schritt 3: CSV neu schreiben
		echo "DEBUG: ".$csvFile;
		$fp = fopen($csvFile, 'w');

		// Header
		fputcsv($fp, $columns, ';', '"', '\\');

		// Bestehende Zeilen
		foreach ($rows as $row) {
			fputcsv($fp, $row, ';', '"', '\\');
		}

		// Neue Zeile
		fputcsv($fp, $newRow, ';', '"', '\\');

		fclose($fp);

		return true;
	}

	// Das hier sind spezielle Variablen, die in jeder Anmeldung vorhanden sein sollten damit die E-Mail korrekt versendet werden kann.
	$email = getData("email");
	$kind = getData("kind");
	$action = getData("action");

	$confMail = "Hallo,<br><br> ".$kind." wurde erfolgreich zu ".$action." angemeldet. <br><br>Viele Grüße, das Rover und Leiter Team der Degginger Pfadis";
	
	$fileName = removeSpecialChars($action);

	$success = false;
	if ($fileName != "") {
		$fileName = "data/".$fileName.".csv";

		if (updateCsvWithPost($fileName, $_POST)) {
			$success = sendConfirmationEmail($email, $confMail);
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
			if ($email != "" && $success) {
				echo "<p>Eine Anmeldebestätigung wurde an ".$email." versendet</p>";
			} else {
				echo "<p>Achtung: Es wurde keine Bestätigung versendet. Das kann daran liegen, dass du keine E-Mail Adresse angegeben hast.</p>";
			}

			echo "DEBUG";
			echo $fileName;
			echo $action;
		?>
		<input type="button" value="Weiteres Kind anmelden" onclick="history.back();">
	</div>
</body>

</html>

