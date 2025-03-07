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
			  <option value="0,1,2,3,4,5,6,7,8,9,10,11">Anmeldung für Kinder</option>
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
				if ($arrFiles[$i] != "." && $arrFiles[$i] != ".." && $arrFiles[$i] != ".htaccess" && $arrFiles[$i] != ".htpasswd") {
					echo "<a href=\"../data/";
					echo $arrFiles[$i];
					echo "\" >";
					echo $arrFiles[$i]."</a><br>";
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
		<p>Die Angaben oben generieren nur einen Link, der alle Infos zur Aktion als Parameter an den Link anhängt. Beispiel</p>
		<i>http://dpsg-deggingen.de/anmeldeformular/formular.php?aktion=pfila+2022&ort=am+Forgensee&start=10.06.2022&end=16.06.2022&anmend=12.12.2021&kosten=120%2C20</i>
		<p>Der letzte Teil <i>kosten=120%2C20</i> gibt die Kosten von 120,20 an, wobei das Komma als %2C kodiert wurde. Das Anmeldeformular wird immer dynamisch aus dem Link generiert. Das bedeutet, wenn man manuell einen Parameter im Link ändert, wird das Anmeldeformular entsprechend angezeigt. Jeder kann z.B. kosten=1%2C20 im Link eintragen und das Anmeldeformular wird dann 1,20 als Kosten anzeigen.</p>
		<p>Nachdem die Daten aus dem Formular abgesendet werden, wandelt ein serverseitiges PHP Script den Aktionsname, z.B. <i>Pfila 2022</i>, in Kleinbuchstaben um und entfernt Sonder- und Leerzeichen, <i>pfila2022</i>. Das dient dann als Dateiname für die CSV Datei in welcher die Anmeldungen gespeichert werden. Falls im oberen Beispiel die Datei pfila2022.csv noch nicht vorhanden ist, wird sie erstellt und die erste Anmeldung dort eingetragen. Falls die Datei schon existiert, wird die Anmeldung als neue Zeile eingefügt. Die CSV Dateien können dann vom Orga-Team heruntergeladen und mit Excel geöffnet werden.</p>
		<p>Wichtig: Wird der Parameter <i>aktion</i> im Link geändert, wird eine Anmeldung auch in eine andere Datei gespeichert.</p>
	</div>

</body>

</html>
