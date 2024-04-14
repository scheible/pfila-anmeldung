function checkForm(event) {
	let errorMessage = "Mögliche Fehler im Formular:\n";
	let errorNumber = 0;

	if ($('#kind').val() === "") {
		errorMessage += ("- Es wurde kein Kind eingetragen\n");
		errorNumber++;
	}

	if (!$('#illnessNo').prop('checked') && !$('#illnessYes').prop('checked')) {
		errorMessage += ("- Es wurde kein Feld bei Krankheit ausgefüllt\n");
		errorNumber++;
	}
	if ($('#illnessNo').prop('checked') && $('#illnessYes').prop('checked')) {
		errorMessage += ("- Bei Krankheit wurde ja und nein ausgewählt\n");
		errorNumber++;
	}
	if ($('#illnessYes').prop('checked') && $('#illnessInfo').val() === "") {
		errorMessage += ("- Es wurde Krankheit ausgewählt aber kein Text eingegeben\n");
		errorNumber++;
	}

	if (!$('#allergyNo').prop('checked') && !$('#allergyYes').prop('checked')) {
		errorMessage += ("- Es wurde kein Feld bei Allergie ausgefüllt\n");
		errorNumber++;
	}
	if ($('#allergyNo').prop('checked') && $('#allergyYes').prop('checked')) {
		errorMessage += ("- Bei Allergie wurde ja und nein ausgewählt\n");
		errorNumber++;
	}
	if ($('#allergyYes').prop('checked') && $('#allergyInfo').val() === "") {
		errorMessage += ("- Es wurde Allergie ausgewählt aber kein Text eingegeben\n");
		errorNumber++;
	}

	if (!$('#swimNo').prop('checked') && !$('#swimYes').prop('checked')) {
		errorMessage += ("- Es wurde keine Angabe zum Schwimmen gemacht\n");
		errorNumber++;
	}
	if ($('#swimNo').prop('checked') && $('#swimYes').prop('checked')) {
		errorMessage += ("- Es wurde bei Schwimmen Ja und Nein angekreuzt\n");
		errorNumber++;
	}

	if($('#phone').val() === "" && $('#mobile').val() === "") {
		errorMessage += ("- Es wurde weder eine Telefonnummer noch eine Handynummer als Kontakt angegeben\n");
		errorNumber++;
	}

	if ($('#theretripYes').prop('checked') && $('#theretripCount').val() < 1) {
		errorMessage += ("- Es wurde Hinfahrt angekreuzt, aber keine Anzahl an Plätzen angegeben.\n");
		errorNumber++;
	}
	if (!$('#theretripYes').prop('checked') && $('#theretripCount').val() > 0) {
		errorMessage += ("- Es wurde eine Anzahl an Plätzen für die Hinfahrt angegeben aber Hinfahrt nicht angekreuzt.\n");
		errorNumber++;
	}
	if ($('#theretripCount').val() > 8) {
		errorMessage += ("- Es wurden mehr als 8 Plätze für die Hinfahrt angegeben.\n");
		errorNumber++;
	}

	if ($('#returntripYes').prop('checked') && $('#returntripCount').val() < 1) {
		errorMessage += ("- Es wurde Rückfahrt angekreuzt, aber keine Anzahl an Plätzen angegeben.\n");
		errorNumber++;
	}
	if (!$('#returntripYes').prop('checked') && $('#returntripCount').val() > 0) {
		errorMessage += ("- Es wurde eine Anzahl an Plätzen für die Rückfahrt angegeben aber Hinfahrt nicht angekreuzt.\n");
		errorNumber++;
	}
	if ($('#returntripCount').val() > 8) {
		errorMessage += ("- Es wurden mehr als 8 Plätze für die Rückfahrt angegeben.\n");
		errorNumber++;
	}

	if ($('#accountHolder').val() === "") {
		errorMessage += ("- Es wurde kein Kontoinhaber angegeben.\n");
		errorNumber++;
	}

	let ibanRegEx = /DE[a-zA-Z0-9]{2}\s?([0-9]{4}\s?){4}([0-9]{2})\s?/;
	if (!ibanRegEx.test($('#iban').val())) {
		errorMessage += ("- IBAN entspricht nicht deutschem IBAN Format.\n");
		errorNumber++;
	}


	errorMessage += ("\nAnmeldung trotzdem absenden?\n");

	if (errorNumber > 0) {
		if (!confirm(errorMessage))
			event.preventDefault();
	}
}

function insertName(event) {
	name = $('#kind').val();
	firstname = name.split(/ (.*)/)[0];

	$('.nameKind').text(firstname);
}