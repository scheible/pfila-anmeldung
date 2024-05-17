<script type="text/javascript">
	function bankaccountCheckForErrors() {
		let errorMessage = "";
		let errorNumber = 0;

		if ($('#accountHolder').val() === "") {
			errorMessage += ("- Es wurde kein Kontoinhaber angegeben.\n");
			errorNumber++;
			setRed('accountHolder')
		}

		let ibanRegEx = /DE[a-zA-Z0-9]{2}\s?([0-9]{4}\s?){4}([0-9]{2})\s?/;
		if (!ibanRegEx.test($('#iban').val())) {
			errorMessage += ("- IBAN entspricht nicht deutschem IBAN Format.\n");
			errorNumber++;
			setRed('iban')
		}

		if (errorNumber > 0)
			return errorMessage;
		else
			return "";
	}
	registerVerifyCallback(bankaccountCheckForErrors);
</script>

<div class="formGroup">
		<div class="groudHeading">Kontodaten</div>
		<p>Den Teilnehmerbeitrag und die Getränkekosten von folgendem Konto einziehen</p>
		<input type="text" placeholder="Kontoinhaber" name="accountHolder" id="accountHolder" /><br />
		<input type="text" placeholder="Institut" name="institute" /><br>
		<input type="text" placeholder="IBAN" size="45" name="iban" id="iban" /><br>
		<input type="text" placeholder="BIC" name="bic" />
</div>