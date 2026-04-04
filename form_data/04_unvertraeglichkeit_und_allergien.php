<script type="text/javascript">
    function allergyCheckForErrors() {
        let errorMessage = "";
        let errorNumber = 0;

        if (!$('#allergyNo').prop('checked') && !$('#allergyYes').prop('checked')) {
            errorMessage += ("- Es wurde kein Feld bei Allergie ausgefüllt\n");
            errorNumber++;
            setRed('allergien')
            setRed('allergyNo', 'allergyYes')
            setRed('allergyYes', 'allergyNo')
            setRed('allergyInfo', 'allergyYes', 'allergyNo')
        }
        if ($('#allergyNo').prop('checked') && $('#allergyYes').prop('checked')) {
            errorMessage += ("- Bei Allergie wurde ja und nein ausgewählt\n");
            errorNumber++;
            setRed('allergien')
            setRed('allergyNo', 'allergyYes')
            setRed('allergyYes', 'allergyNo')
        }
        if ($('#allergyYes').prop('checked') && $('#allergyInfo').val() === "") {
            errorMessage += ("- Es wurde Allergie ausgewählt aber kein Text eingegeben\n");
            errorNumber++;
            setRed('allergien')
        }

        if (errorNumber > 0)
            return [false, errorMessage];
        else
            return [false, ""];
    }
    registerVerifyCallback(allergyCheckForErrors);

</script>

<div class="formGroup" id="allergien">
    <div class="groudHeading"><span class="nameKind">der Teilnehmer</span> hat Lebensmittelunverträglichkeiten oder Allergien</div>

    <label class="radiobox">
        <input type="radio" name="allergy" id="allergyNo" value="x"/> Nein
    </label>
    <label class="radiobox">
        <input type="radio" name="allergy" id="allergyYes" value="x"/> Ja, nämlich
    </label>
    
    <textarea name="allergyInfo" id="allergyInfo" placeholder="info"></textarea>
</div>
