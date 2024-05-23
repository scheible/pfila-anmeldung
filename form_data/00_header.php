
<div class="formGroup">
	<h1>Verbindliche Anmeldung</h1>
	<p>zum <b><?php echo $action; ?></b> der Pfadfinder, Stamm Hl. Kreuz Deggingen,<br>
	<?php echo $place; ?><br>
	vom <?php echo $startDate; ?> - <?php echo $endDate; ?><br>
	Anmeldeschluss: <?php echo $expire; ?></p>

	<p><b>Kosten</b></br>
		<table>
		<tr><td>Erstes Kind:</td><td><?php echo number_format(floatval(str_replace(',', '.', $kostenKind)), 2, ',', ''); ?> EUR</td></tr>
		<tr><td>Weiteres Kind:</td><td> <?php echo number_format(floatval(str_replace(',', '.' , $kostenWeiteresKind)), 2, ',', ''); ?> EUR</td></tr>
		<tr><td>Rover/Leiter:</td><td> <?php echo number_format(floatval(str_replace(',', '.' , $kostenLeiter)), 2, ',', ''); ?> EUR</td></tr>
		</table>
	</p>

	<p>
		Nach der Anmeldung erhälst du eine Bestätigung per E-Mail. Solltest du keine Bestätigung erhalten oder sonstige Probleme auftreten, wende dich gerne an anmelden@dpsg-deggingen.de oder direkt an die Gruppenleiter. Eingegebene Daten kannst du nach dem Abschicken nicht mehr ändern. In dem Fall bitte die Anmeldung nochmal ausfüllen und eine Bemerkung eintragen. 
	</p>
</div>