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
            setRed('krankheit')
            setRed('illnessInfo', 'illnessYes', 'illnessNo')
        }

        if (errorNumber > 0)
            return errorMessage;
        else
            return "";
    }
    registerVerifyCallback(illnessCheckForErrors);

</script>

<div class="formGroupe" id="krankheit">
    <div class="groudHeading">Besondere Krankheit, auf die zu achten, oder Medikamente, die regelmäßig einzunehmen sind?</div>
    <input type="radio" name="illness" id="illnessNo" value="x"/> Nein<br>
    <input type="radio" name="illness" id="illnessYes" value="x"/> Ja, nämlich<br>
    <textarea name="illnessInfo" id="illnessInfo" placeholder="info"></textarea>
</div>
