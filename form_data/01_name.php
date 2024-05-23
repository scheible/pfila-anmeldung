<script type="text/javascript">
    function kindCheckForErrors() {
        if ($('#kind').val() === "") {
            setRed('kindname');
            setRed('kind');
            return ("- Es wurde kein Kind eingetragen\n");
        }   
        return "";
    }
    
    registerVerifyCallback(kindCheckForErrors);
</script>

<div class="formGroupe" id="kindname">
    <div class="groudHeading">Name des Teilnehmers oder der Teilnehmerin</div>
    <input type="text" placeholder="Vorname Nachname Kind" name="kind" id="kind" onchange="insertName(event);"/><br>
    <div>
        <p onclick="$('#infoMultiKids').show();">Mehrere Kinder Anmelden?</p>
        <p id="infoMultiKids" style="display:none;">Für jedes Kind muss das Formular neu ausgefüllt werden. Nach Abschicken der Anmeldung kann über die Zurückfunktion des Browser das Formular mit den bereits eingetragenen Daten erneut geöffnet und die Daten für das nächste Kind geändert werden.</p>
    </div>
</div>
