<script type="text/javascript">
	function transportCheckForErrors() {
		let errorMessage = "";
		let errorNumber = 0;

		if ($('#theretripYes').prop('checked') && $('#theretripCount').val() < 1) {
			errorMessage += ("- Es wurde Hinfahrt angekreuzt, aber keine Anzahl an Plätzen angegeben.\n");
			errorNumber++;
			setRed('trips')
			setRed('theretripCount', 'theretripYes')
			setRed('theretripYes', 'theretripCount')
		}
		if (!$('#theretripYes').prop('checked') && $('#theretripCount').val() > 0) {
			errorMessage += ("- Es wurde eine Anzahl an Plätzen für die Hinfahrt angegeben aber Hinfahrt nicht angekreuzt.\n");
			errorNumber++;
			setRed('trips')
			setRed('theretripCount', 'theretripYes')
			setRed('theretripYes', 'theretripCount')
		}
		if ($('#theretripCount').val() > 8) {
			errorMessage += ("- Es wurden mehr als 8 Plätze für die Hinfahrt angegeben.\n");
			errorNumber++;
			setRed('trips')
			setRed('theretripCount')
		}

		if ($('#returntripYes').prop('checked') && $('#returntripCount').val() < 1) {
			errorMessage += ("- Es wurde Rückfahrt angekreuzt, aber keine Anzahl an Plätzen angegeben.\n");
			errorNumber++;
			setRed('trips')
			setRed('returntripCount')
		}
		if (!$('#returntripYes').prop('checked') && $('#returntripCount').val() > 0) {
			errorMessage += ("- Es wurde eine Anzahl an Plätzen für die Rückfahrt angegeben aber Hinfahrt nicht angekreuzt.\n");
			errorNumber++;
			setRed('trips')
			setRed('returntripCount')
		}
		if ($('#returntripCount').val() > 8) {
			errorMessage += ("- Es wurden mehr als 8 Plätze für die Rückfahrt angegeben.\n");
			errorNumber++;
			setRed('trips')
			setRed('returntripCount')
		}

		if (errorNumber > 0)
			return errorMessage;
		else
			return "";
	}
	registerVerifyCallback(transportCheckForErrors);

</script>

<div class="formGroup"id="trips">
	<div class="groudHeading">Ich kann fahren am</div>
	<input type="checkbox" name="theretripYes" id="theretripYes" value="x"/> <?php echo $startDate; ?> Freie Plätze <input type="number" min="1" name="theretripCount" id="theretripCount"><br>
	<input type="checkbox" name="returnTripYes" id="returntripYes" value="x"/> <?php echo $endDate; ?> Freie Plätze <input type="number" min="1" id="returntripCount"><br>
	<p>
		Bitte die eigenen Kinder <i>nicht</i> von den freien Plätzen abziehen. Natürlich weisen wir eure Kinder keinem anderen Fahrzeug zu, falls ihr selbst fahrt.
	</p>
</div>