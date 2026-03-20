<script type="text/javascript">
    function isValidEmail(email) {
        const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return pattern.test(email);
    }

    function phoneCheckForErrors() {
        let errorMessage = "";
        let errorNumber = 0;
        let blocking = false;

        if($('#phone').val() === "" && $('#mobile').val() === "") {
            errorMessage += ("- Es wurde weder eine Telefonnummer noch eine Handynummer als Kontakt angegeben\n");
            errorNumber++;
            setRed('mobile', 'phone')
            setRed('phone', 'mobile')
        }
        if(!isValidEmail($('#email').val())) {
            errorMessage += ("- Es wurde keine gültige E-Mailadresse angeben!");
            errorNumber++;
            setRed('email', 'email')
            blocking = true;
        }

        if (errorNumber > 0)
            return [blocking, errorMessage];
        else
            return [false, ""];
    }
    registerVerifyCallback(phoneCheckForErrors);

</script>

<div class="formGroupe">
    <div class="groudHeading">Kontaktdaten, unter der die Erziehungsberechtigten während der Freizeit zu erreichen sind. Rover und Leiter bitte eigene E-Mail Adresse angeben.</div>
    <input type="text" placeholder="Telefon" name="phone" id="phone" /><br />
    <input type="text" placeholder="Mobiltelefon" name="mobile" id="mobile" /><br />
    <input type="text" placeholder="E-Mail" name="email" id="email" /><br />
</div>
