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
			<tr><td>Erstes Kind:</td><td><?php echo $kostenKind; ?> EUR</td></tr>
			<tr><td>Weiteres Kind:</td><td> <?php echo $kostenWeiteresKind; ?> EUR</td></tr>
			<tr><td>Rover/Leiter:</td><td> <?php echo $kostenLeiter; ?> EUR</td></tr>
			</table>
		</p>

		<p>
			Nach der Anmeldung erhälst du eine Bestätigung per E-Mail. Solltest du keine Bestätigung erhalten oder sonstige Probleme auftreten, wende dich gerne an anmelden@dpsg-deggingen.de oder direkt an die Gruppenleiter. Eingegebene Daten kannst du nach dem Abschicken nicht mehr ändern. In dem Fall bitte die Anmeldung nochmal ausfüllen und eine Bemerkung eintragen. 
		</p>
	</div>

	<div class="formGroup">
		<div class="groudHeading">Name des Teilnehmers oder der Teilnehmerin</div>
		<input type="text" placeholder="Vorname Nachname Kind" name="kind" id="kind" onchange="insertName(event);"/><br>
		<div>
			<p onclick="$('#infoMultiKids').show();">Mehrere Kinder Anmelden?</p>
			<p id="infoMultiKids" style="display:none;">Für jedes Kind muss das Formular neu ausgefüllt werden. Nach Abschicken der Anmeldung kann über die Zurückfunktion des Browser das Formular mit den bereits eingtragenen Daten erneut geöffnet und die Daten für das nächste Kind geändert werden.</p>
		</div>
	</div>

	<div class="formGroup">
		<div class="groudHeading">Besondere Krankheit, auf die zu achten, oder Medikamente, die regelmäßig einzunehmen sind?</div>
		<input type="checkbox" name="illnessNo" id="illnessNo" value="x"/> Nein<br>
		<input type="checkbox" name="illnessYes" id="illnessYes" value="x"/> Ja, nämlich<br>
		<textarea name="illnessInfo" id="illnessInfo" placeholder="info"></textarea>
	</div>

	<div class="formGroup">
		<div class="groudHeading">Wichtig! Bitte aufmerksam durchlesen!</div>
		<p>Da es uns aus rechtlichen Gründen nicht gestattet ist, Eurem Kind Medikamente zu verabreichen, bitten wir Euch, die für Euer Kind notwendigen Medikamente einnahmefertig und mit Namen beschriftet beim jeweiligen Betreuer abzugeben, der Euer Kind auf die Einnahme hinweisen wird. Schließlich zwingt uns die Rechtslage dazu, euer Einverständnis für kleinere medizinische Hilfen durch unsere Betreuer zu bitten. Natürlich werden wir bei Verletzungen, die wir nicht einschätzen können oder bei Verschlechterung des Allgemeinzustandes einen Arzt aufsuchen und Euch ggf. informieren.</p>

		<p>ich bin damit einverstanden, dass (bei) meinem Kind: (bitte zutreffendes ankreuzen)</p>

		<input type="checkbox" name="pflaster" id="pflaster" value="x"/>bei kleineren Verletzungen oder Schürfwunden ein Pflaster verabreicht wird<br>
		<input type="checkbox" name="pflasterAllergie" id="pflasterAllergie" value="x"/>mein Kind hat eine Pflasterallergie<br>
		<input type="checkbox" name="bepanthen" id="bepanthen" value="x"/>kleinere Wunden oder Verletzungen mit einem Desinfektionsspray oder Salbe (Bepanthen o. ä.) behandelt werden<br>
		<input type="checkbox" name="zecken" id="zecken" value="x"/>Zecken mit einer Zeckenzange/-karte entfernt werden<br>
		<input type="checkbox" name="zeckenArzt" id="zeckenArzt" value="x"/>Entfernung nur durch einen Arzt gewünscht<br>
		<input type="checkbox" name="wespenstich" id="wespenstich" value="x"/>bei Mücken- oder Wespenstichen eine entsprechende Salbe (Fenistil o.ä.) verabreicht wird <br>
		<input type="checkbox" name="spreisel" id="spreisel" value="x"/>kleinere Fremdkörper (z.B. Spreißel) mit einer Pinzette entfernt werden dürfen<br>

		Datum der letzten Impfung gegen Tetanus
		<input type="text" placeholder="Datum" name="tetanus" id="tetanus" /><br />

		<p>Was noch im Umgang mit meinem Kind beachtet werden muss bitte im Bemerkungsfeld unten angeben.</p> 
		
	</div>

	<div class="formGroup">
		<div class="groudHeading"><span class="nameKind">der Teilnehmer</span> hat Lebensmittelunverträglichkeiten oder Allergien</div>
		<input type="checkbox" name="allergyNo" id="allergyNo" value="x"/> Nein<br>
		<input type="checkbox" name="allergyYes" id="allergyYes" value="x"/> Ja, nämlich<br>
		<textarea name="allergyInfo" id="allergyInfo" placeholder="info"></textarea>
	</div>

	<div class="formGroup">
		<div class="groudHeading">Kann <span class="nameKind">der Teilnehmer</span> ohne besondere Aufsicht schwimmen?</div>
		<input type="checkbox" name="swimYes" id="swimYes" value="x"/>Ja<br>
		<input type="checkbox" name="swimNo" id="swimNo" value="x"/>Nein<br>
	</div>

	<div class="formGroup">
		<div class="groudHeading"><span class="nameKind">der Teilnehmer</span> ist</div>
		<input type="checkbox" name="vegetarian" value="x"/>Vegetarier/in<br>
		<input type="checkbox" name="vegan" value="x"/>Veganer/in<br>
	</div>


	<div class="formGroup">
		<div class="groudHeading">Kontaktdaten, unter der die Erziehungsberechtigten während der Freizeit zu erreichen sind. Rover und Leiter bitte eigene E-Mail Adresse angeben.</div>
		<input type="text" placeholder="Telefon" name="phone" id="phone" /><br />
		<input type="text" placeholder="Mobiltelefon" name="mobile" id="mobile" /><br />
		<input type="text" placeholder="E-Mail" name="email" id="email" /><br />
	</div>

	<div class="formGroup">
		<div class="groudHeading">Ich kann fahren am</div>
		<input type="checkbox" name="theretripYes" id="theretripYes" value="x"/> <?php echo $startDate; ?> Freie Plätze <input type="number" min="1" name="theretripCount" id="theretripCount"><br>
		<input type="checkbox" name="returnTripYes" id="returntripYes" value="x"/> <?php echo $endDate; ?> Freie Plätze <input type="number" min="1" id="returntripCount"><br>
		<p>
			Bitte die eigenen Kinder <i>nicht</i> von den freien Plätzen abziehen. Natürlich weisen wir eure Kinder keinem anderen Fahrzeug zu, falls ihr selbst fahrt.
		</p>
	</div>

	<div class="formGroup">
		<div class="groudHeading">Kontodaten</div>
		<p>Den Teilnehmerbeitrag und die Getränkekosten von folgendem Konto einziehen</p>
		<input type="text" placeholder="Kontoinhaber" name="accountHolder" id="accountHolder" /><br />
		<input type="text" placeholder="Institut" name="institute" /><br>
		<input type="text" placeholder="IBAN" size="45" name="iban" id="iban" /><br>
		<input type="text" placeholder="BIC" name="bic" />
	</div>

	<div class="formGroup">
		<div class="groudHeading">Bemerkungen</div>
		<p>Weitere Bemerkungen</p>
		<textarea name="freieBemerkung" id="freieBemerkung" placeholder="Freier Text"></textarea>
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