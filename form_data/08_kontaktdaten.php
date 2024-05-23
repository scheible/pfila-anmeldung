<script type="text/javascript">
    function phoneCheckForErrors() {
        let errorMessage = "";
        let errorNumber = 0;

        if($('#phone').val() === "" && $('#mobile').val() === "") {
            errorMessage += ("- Es wurde weder eine Telefonnummer noch eine Handynummer als Kontakt angegeben\n");
            errorNumber++;
            setRed('mobile', 'phone')
            setRed('phone', 'mobile')
        }

        if (errorNumber > 0)
            return errorMessage;
        else
            return "";
    }
    registerVerifyCallback(phoneCheckForErrors);

</script>

<div class="formGroupe">
    <div class="groudHeading">Kontaktdaten, unter der die Erziehungsberechtigten während der Freizeit zu erreichen sind. Rover und Leiter bitte eigene E-Mail Adresse angeben.</div>
    <input type="text" placeholder="Telefon" name="phone" id="phone" /><br />
    <input type="text" placeholder="Mobiltelefon" name="mobile" id="mobile" /><br />
    <input type="text" placeholder="E-Mail" name="email" id="email" /><br />
</div>
