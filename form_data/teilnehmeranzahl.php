<div class="formGroupe">
    <div class="groudHeading">Name des Teilnehmers oder der Teilnehmerin</div>
    <input type="text" placeholder="Vorname Nachname Kind" name="kind" id="kind" onchange="insertName(event);"/><br>
    <div>
        <p onclick="$('#infoMultiKids').show();">Mehrere Kinder Anmelden?</p>
        <p id="infoMultiKids" style="display:none;">Für jedes Kind muss das Formular neu ausgefüllt werden. Nach Abschicken der Anmeldung kann über die Zurückfunktion des Browser das Formular mit den bereits eingetragenen Daten erneut geöffnet und die Daten für das nächste Kind geändert werden.</p>
    </div>
</div>


