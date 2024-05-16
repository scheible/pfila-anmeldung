<form action = "anmelden.php" method = "POST" >

	<input type="text" hidden="true" name="action" value="<?php echo $action; ?>" >

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

	<div class="formGroup">
		<?php include("form_data/name.php"); ?>
	</div>

	<div class="formGroup">
		<?php include("form_data/gesundheitsinformationen.php"); ?>
	</div>

	<div class="formGroup">
		<?php include("form_data/medizinischer_kontext.php"); ?>
	</div>

	<div class="formGroup">
		<?php include("form_data/unvertraeglichkeit_und_allergien.php"); ?>
	</div>

	<div class="formGroup">
		<?php include("form_data/schwimmfaehigkeit.php"); ?>
	</div>

	<div class="formGroup">
		<?php include("form_data/ernaehrungsgewohnheiten.php"); ?>
	</div>


	<div class="formGroup">
		<?php include("form_data/kontaktdaten.php"); ?>
	</div>

	<div class="formGroup">
		<?php include("form_data/transportfaehigkeit.php"); ?>
	</div>

	<div class="formGroup">
		<?php include("form_data/zahlungsinformationen.php"); ?>
	</div>

	<div class="formGroup">
		<p>
		Die Aufsichtspflicht über die Teilnehmer/innen wird durch die Leiter verantwortungsvoll wahrgenommen. Für Folgen der Übertretung der Freizeitordnung oder der Anweisungen der Leiter/innen können Leiter und Vorstand darüber hinaus keine Haftung übernehmen.
		</p>

		<p>
		Bei grober Fahrlässigkeit, Unkameradschaftlichkeit und Ungehorsam muss eine Rücksendung des/der Teilnehmers/in auf eigene Kosten, Verantwortung und ohne irgendwelche Kostenerstattung erfolgen. Sollte während der Freizeit die Behandlung des/der Teilnehmers/in durch einen Arzt nötig sein, nimmt die Freizeitleitung Rücksprache mit den Erziehungsberechtigen, sofern dies möglich ist. Sollten diese nicht erreichbar sein, liegt es im Ermessen des jeweiligen behandelnden Arztes oder der Freizeitleitung, Entscheidungen über notwendige Eingriffe/Impfungen zu treffen. Den Teilnehmern/innen kann stundenweise Freizeit ohne Aufsicht gewährt werden, sofern dies nicht ausdrücklich untersagt wird. Dieses ist der Freizeitleitung schriftlich durch die/den Erziehungsberechtigten mitzuteilen.
		</p>

		<p>
		Der Teilnehmerbeitrag (wie in der Einladung angegeben) und die Getränkekosten, die während der Freizeit entstehen, werden von den Pfadfindern Deggingen eingezogen.
		</p>

		<p>
		Die Anmeldung durch dieses Formular ist verbindlich! Wir behalten uns vor bei Absagen eventuell entstandene Kosten zu
		berechnen.<br>
		Der Anmeldeschluss in der Einladung ist zu beachten. Nach Ablauf des Anmeldeschlusses können ggf. anschließend eingereichte Anmeldungen nicht mehr berücksichtigt werden!
		</p>

		<p>
		Bei der Aktion gemachte Bildmaterialien werden vom Verband, Bezirk oder Stamm ggf. online und/oder als Printmedium veröffentlicht.
		</p>

		<p>
		Mit der Anmeldung zur Freizeit erkennen Teilnehmer/in und beide Erziehungsberechtigten diese Bedingungen an.
		</p>
	</div>

	<div class="formGroup" style="text-align: right;">
		<input type="checkbox" onclick="$('#submitButton').prop('disabled', !$(this).prop('checked'));"/><span>Der Datenschutzbestimmung nach DSGVO zustimmen</span><br />
		<input type="submit" id="submitButton" value="Verbindlich Anmelden" disabled="True" onclick="checkForm(event);"/>
	</div>

	<div class="bottomInfo">
		<p>Die Anmeldung wird verschlüsselt übertragen. Fehlerhafte Angaben können über dieses Formular nicht mehr geändert werden. Falls ihr Angaben korrigieren wollt, kontaktiert bitte anmelden@dpsg-deggingen.de, schreibt im Eltern Whatsapp Chat oder wendet euch an den Gruppenleiter.</p>
	</div>

	
</form>
