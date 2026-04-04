<script type="text/javascript">
	function transportCheckForErrors() {
		let errorMessage = "";
		let errorNumber = 0;

		if ($('#theretripYes').prop('checked') && $('#theretripCount').val() < 1) {
			errorMessage += ("- Es wurde Hinfahrt angekreuzt, aber keine Anzahl an Plätzen angegeben.\n");
			errorNumber++;
			setRed('theretripCount', 'theretripYes')
			setRed('theretripYes', 'theretripCount')
		}
		if (!$('#theretripYes').prop('checked') && $('#theretripCount').val() > 0) {
			errorMessage += ("- Es wurde eine Anzahl an Plätzen für die Hinfahrt angegeben aber Hinfahrt nicht angekreuzt.\n");
			errorNumber++;
			setRed('theretripCount', 'theretripYes')
			setRed('theretripYes', 'theretripCount')
		}
		if ($('#theretripCount').val() > 8) {
			errorMessage += ("- Es wurden mehr als 8 Plätze für die Hinfahrt angegeben.\n");
			errorNumber++;
			setRed('theretripCount', 'theretripYes')
		}

		if ($('#returntripYes').prop('checked') && $('#returntripCount').val() < 1) {
			errorMessage += ("- Es wurde Rückfahrt angekreuzt, aber keine Anzahl an Plätzen angegeben.\n");
			errorNumber++;
			setRed('returntripYes', 'returntripCount')
			setRed('returntripCount', 'returntripYes')
		}
		if (!$('#returntripYes').prop('checked') && $('#returntripCount').val() > 0) {
			errorMessage += ("- Es wurde eine Anzahl an Plätzen für die Rückfahrt angegeben aber Rückfahrt nicht angekreuzt.\n");
			errorNumber++;
			setRed('returntripCount', 'returntripYes')
		}
		if ($('#returntripCount').val() > 8) {
			errorMessage += ("- Es wurden mehr als 8 Plätze für die Rückfahrt angegeben.\n");
			errorNumber++;
			setRed('returntripCount', 'returntripYes')
		}

		if (errorNumber > 0)
			return [false, errorMessage];
		else
			return [false, ""];
	}
	registerVerifyCallback(transportCheckForErrors);

</script>

<div class="formGroup"id="trips">
	<div class="groudHeading">Ich kann fahren am</div>

	<label class="checkbox">
		<input type="checkbox" name="theretripYes" id="theretripYes" value="x"/> <?php echo $startDate; ?> Freie Plätze <input type="number" min="1" name="theretripCount" id="theretripCount">
	</label>

	<label class="checkbox">
		<input type="checkbox" name="returnTripYes" id="returntripYes" value="x"/> <?php echo $endDate; ?> Freie Plätze <input type="number" min="1" id="returntripCount">
	</label>
	<p>
		Bitte die eigenen Kinder <i>nicht</i> von den freien Plätzen abziehen. Natürlich weisen wir eure Kinder keinem anderen Fahrzeug zu, falls ihr selbst fahrt.
	</p>
</div>