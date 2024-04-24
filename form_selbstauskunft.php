<form action = "selbstauskunft.php" method = "POST" >

	<input type="text" hidden="true" name="action" value="<?php echo $action; ?>" >

	<div class="formGroup">
		<h1>Selbstauskunftserklärung</h1>
		<p>zum <b><?php echo $action; ?></b> der Pfadfinder, Stamm Hl. Kreuz Deggingen,<br>
		<?php echo $place; ?><br>

	</div>

	<div class="formGroup">
		<div class="groudHeading">Vorname</div>
		<input type="text" placeholder="Vorname" name="vorname" id="vorname" /><br>
		<div>

<div class="formGroup">
		<div class="groudHeading">Nachname</div>
		<input type="text" placeholder="Nachname" name="nachname" id="nachname" /><br>
		<div>

<div class="formGroup">
		<div class="groudHeading">Anschrift</div>
		<input type="text" placeholder="Anschrift" name="anschrift" id="anschrift" /><br>
		<div>

<div class="formGroup">
		<div class="groudHeading">Geburtsdatum</div>
		<input type="text" placeholder="Geburtsdatum" name="geburtstag" id="geburtstag" /><br>
		<div>

<div class="formGroup">
		<div class="groudHeading">Funktion in der DPSG</div>
		<input type="text" placeholder="Funktion" name="funktion_in_dpsg" id="funktion_in_dpsg" /><br>
		<div>
			
	
	<div class="formGroup" style="text-align: right;">
		<input type="submit" id="submitButton" value="Verbindlich Anmelden"/>
	</div>

	<div class="bottomInfo">
		<p>Die Anmeldung wird verschlüsselt übertragen. Fehlerhafte Angaben können über dieses Formular nicht mehr geändert werden. Falls ihr Angaben korrigieren wollt, kontaktiert bitte anmelden@dpsg-deggingen.de, schreibt im Eltern Whatsapp Chat oder wendet euch an den Gruppenleiter.</p>
	</div>

	
</form>