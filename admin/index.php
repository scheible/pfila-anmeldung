<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  </script>
	<script type="text/javascript" src="verify.js"></script>
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<form action="../" method="get">
		<div class="formWrapper">
			<div class="formGroup">
				<div class="groudHeading">Link zur Anmeldung generieren</div>

				<label>Aktion</label>
				<input type="text" id="action" name="aktion" placeholder="Aktion zb Pfila 2022"/><br>

				<label>Ort</label>
				<input type="text" id="place" name="ort" placeholder="Ort zB am Forgensee" /><br>

				<label>Startdatum</label>
				<input type="text" id="start" name="start" placeholder="Datum im Format 01.01.2025"/><br>

				<label>Enddatum</label>
				<input type="text" id="end" name="end" placeholder="Datum im Format 01.01.2025"/><br>

				<label>Anmeldeschluss</label>
				<input type="text" id="anmend" name="anmend" placeholder="Datum im Format 01.01.2025"/><br>

				<label>Kosten Kind 1</label>
				<input type="text" id="kostenKind" name="kostenKind" placeholder="zB 50,20 (eingeben ohne EUR am Ende)" ><br><br>

				<label>Kosten weiteres Kind</label>
				<input type="text" id="kostenWeiteresKind" name="kostenWeiteresKind" placeholder="zB 50,20 (eingeben ohne EUR am Ende)" ><br><br>

				<label>Kosten Rover/Leiter</label>
				<input type="text" id="kostenLeiter" name="kostenLeiter" placeholder="zB 50,20 (eingeben ohne EUR am Ende)" ><br><br>

				<label for="formblocks">Formularvariante auswählen</label>
				<select name="formblocks" id="formblocks">
				<option value="0,1,2,3,4,5,6,8,9,10,11">Anmeldung für Kinder</option>
				<option value="0,1,12,4,6,8,9,10,11">Anmeldung Rover Leiter</option>
				</select> <br><br>

				<input type="submit" value="Link generieren" >
			</div>
		</form>

		<div class="formGroup">
			<div class="groudHeading">Vorhandene Anmeldungen</div>

			<?php


				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);


				$arrFiles = array();
				$handle = opendir('../data');
				
				if ($handle) {
					while (($entry = readdir($handle)) !== FALSE) {
						$arrFiles[] = $entry;
					}
				}
				
				closedir($handle);

				$numFiles = 0;
				for ($i = 0; $i < count($arrFiles); $i++) {
					if (!str_starts_with($arrFiles[$i], '.')) {
						echo "<a href=\"../data/";
						echo $arrFiles[$i];
						echo "\" >";
						echo $arrFiles[$i]."</a>";
						echo " <a href=\"view.php?file=$arrFiles[$i]\">anzeigen</a><br />";
						//echo "</a> ";
						//echo "<a href=\"test\">löschen</a><br>";
						$numFiles++;
					}
				}

				if ($numFiles <= 0) {
					echo "Keine Anmeldungen vorhanden";
				}

			?>
		</div>

		<div class="formGroup">
			<div class="groudHeading">Info</div>
			<p>Die CSV Dateien mit den Anmeldungen nur herunterladen wenn absolut notwendig!</p>
			<p>Die CSV Datei nur lokal auf euren Geräten speichern. Nicht in Google Drive, Dropbox, Apple Cloud, One Drive oder andere Cloudanbieter hochladen. Auch beachten ob eure Geräte automatisch mit einer Cloud synchronisiert werden!</p>
			<p>Bitte daran denken, dass ihr die CSV Datei von eurem Gerät wieder löscht, sobald ihr sie nicht mehr benötigt.</p>
			<h3>Warum?</h3>
			<p>Persönliche Daten (Gesundheitsdaten, Kontodaten) müssen laut Gesetz (DSGVO) wie oben beschrieben geschützt sein. Wenn wir dagegen verstoßen, könnten wir als Stamm oder die Vorstände persönlich dafür haftbar gemacht werden. Und das will keiner!</p>
		</div>
	</div>

</body>

</html>
