<script type="text/javascript">
    function illnessCheckForErrors() {
        let errorMessage = "";
        let errorNumber = 0;

        if (!$('#illnessNo').prop('checked') && !$('#illnessYes').prop('checked')) {
            errorMessage += ("- Es wurde kein Feld bei Krankheit ausgefüllt\n");
            errorNumber++;
            setRed('krankheit')
        }
        if ($('#illnessNo').prop('checked') && $('#illnessYes').prop('checked')) {
            errorMessage += ("- Bei Krankheit wurde ja und nein ausgewählt\n");
            errorNumber++;
            setRed('krankheit')
        }
        if ($('#illnessYes').prop('checked') && $('#illnessInfo').val() === "") {
            errorMessage += ("- Es wurde Krankheit ausgewählt aber kein Text eingegeben\n");
            errorNumber++;
            setRed('illnessInfo', 'illnessYes', 'illnessNo')
        }

        if (errorNumber > 0)
            return [false, errorMessage];
        else
            return [false, ""];
    }
    registerVerifyCallback(illnessCheckForErrors);

</script>

<div class="formGroup" id="krankheit">
    <div class="groudHeading">Besondere Krankheit, auf die zu achten, oder Medikamente, die regelmäßig einzunehmen sind?</div>

    <input type="hidden" name="Besondere_Krankheit" value="Keine Angabe">
    <label class="radiobox">
        <input type="radio" name="Besondere_Krankheit" id="illnessNo" value="Nein"/> Nein
    </label>
    <label class="radiobox">
        <input type="radio" name="Besondere_Krankheit" id="illnessYes" value="Ja"/> Ja, nämlich
    </label>

    <textarea name="Besondere_Krankheit_Info" id="illnessInfo" placeholder="info"></textarea>
</div>
