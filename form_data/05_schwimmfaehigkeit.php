<script type="text/javascript">
    function swimmingCheckForErrors() {
        let errorMessage = "";
        let errorNumber = 0;

        if (!$('#swimNo').prop('checked') && !$('#swimYes').prop('checked')) {
            errorMessage += ("- Es wurde keine Angabe zum Schwimmen gemacht\n");
            errorNumber++;
            setRed('schwimmen')
            setRed('swimYes', 'swimNo')
            setRed('swimNo', 'swimYes')
        }
        if ($('#swimNo').prop('checked') && $('#swimYes').prop('checked')) {
            errorMessage += ("- Es wurde bei Schwimmen Ja und Nein angekreuzt\n");
            errorNumber++;
            setRed('schwimmen')
            setRed('swimYes', 'swimNo')
            setRed('swimNo', 'swimYes')
        }

        if (errorNumber > 0)
            return errorMessage;
        else
            return "";
    }
    registerVerifyCallback(swimmingCheckForErrors);

</script>

<div class="formGroupe" id="schwimmen">
    <div class="groudHeading">Kann <span class="nameKind">der Teilnehmer</span> ohne besondere Aufsicht schwimmen?</div>
    <input type="radio" name="swim" id="swimYes" value="x"/>Ja<br>
    <input type="radio" name="swim" id="swimNo" value="x"/>Nein<br>
</div>
