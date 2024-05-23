<form action = "anmelden.php" method = "POST" >

	<input type="text" hidden="true" name="action" value="<?php echo $action; ?>" >


	
	<?php
	

	
	foreach($parsedFormblocks as $blockIndex) {
		echo '<div class="formGroup">';
		
		include($formblockMap[$blockIndex]);
		
		echo '</div>';
	}
	
	?>

	<div class="formGroup" style="text-align: right;">
		<input type="checkbox" onclick="$('#submitButton').prop('disabled', !$(this).prop('checked'));"/><span>Der Datenschutzbestimmung nach DSGVO zustimmen</span><br />
		<input type="submit" id="submitButton" value="Verbindlich Anmelden" disabled="True" onclick="checkForm(event);"/>
	</div>

	<div class="bottomInfo">
		<p>Die Anmeldung wird verschlüsselt übertragen. Fehlerhafte Angaben können über dieses Formular nicht mehr geändert werden. Falls ihr Angaben korrigieren wollt, kontaktiert bitte anmelden@dpsg-deggingen.de, schreibt im Eltern Whatsapp Chat oder wendet euch an den Gruppenleiter.</p>
	</div>

	
</form>
