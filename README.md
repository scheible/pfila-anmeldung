# pfila-anmeldung
Sammlung von PHP Skripten, die Anmeldeformulare für Zeltlager etc. bereitstellen.


## Zeltlageranmeldung
Alle Informationen zum jeweiligen Zeltlager (Zeitraum, Ort, Kosten, Anmeldeschluss) sind als GET Parameter im URI String angegeben. Wenn das Formular mit den entsprechenden Parametern aufgerufen wird, generiert das PHP Skript ein entsprechendes Anmeldeformular.
Die Daten aus dem Anmeldeformular gehen per POST Request an ein weiteres PHP Skript, das die Anmeldedaten in eine CSV Datei auf dem Server speichert.

Einstiegspunkt ist index.php. Dieses Skript enthält den HTML Boilerplate und nimmt einige GET Parameter in PHP entgegen. Die Funktion _getParameter($paramName)_ übernimmt eine einfache Input Validation.
Die Funktion _verifyHash()_ wird zur Zeit nicht genutzt. Diese war dazu gedacht, dass Parameter in der URL nicht beliebig geändert werden können. Hier ist der Nutzen, einfach URLS generieren zu können größer, als das Risiko, dass Parameter verändert werden.

Als erstes wird geprüft, ob das Anmeldedatum bereits abgelaufen ist. Je nachdem wird eine Fehlerseite (_toolate.php_) oder das Anmeldeformular (_form.php_) in die Seite eingebettet.

Das Formular besteht aus einem HTML Formular (_form.php_), in welches dynamisch serverseitig die Parameter aus der URL eingefügt werden. In _style.css_ sind die Formate definiert. Die Datei _verify.js_ wird eingebunden. Diese übernimmt
1. Der Name des Teilnehmers wird per Javascript dynamisch im Formular eingefügt
2. Vor dem Absenden prüft eine Javascript Funktion die Eingaben. Fehler werden in einer Meldung angezeigt, können aber weggeklickt werden. Bei Submit wird ein POST Request an _anmelden.php_ gesendet.

Das Skript _anmelden.php_ nimmt die Parameter aus dem POST Request entgegen und speichert diese in eine .csv Datei auf dem Server.
Erster Schritt ist eine einfache Input Validation mit der Funktion _getData($name)_ und einem Speichern in einer Variable. Die Variable werden zu einem String mit ";" Trenner zusammengefügt. Die CSV Datei hat den gleichen Namen wie die Aktion (Z.b. Zeltlager2024). Sollte die Datei nicht existieren, wird sie angelegt und ein Header eingefügt. Falls das Schreiben in die Datei erfolgreich war, wird eine Bestätigungs E-Mail versendet.

## Selbstauskunft
Anderes Formular. Code ähnlich zur Zeltlageranmeldung, aber in anderen Dateien organisiert.
Formular: selbstauskunft.htm (ohne dynamischen Inhalt) + selbstauskunft.css
Backend: selbstauskunftupload.php -> speichert immer in Datei selbstauskunft.csv


# Admin Zugang

# Neue Nutzer für Admin Zugang erstellen
Zugriff auf Admin Zugang wird per .htaccess beschränkt. Um einen neuen Nutzer hinzuzufügen, muss er in .htpasswd aufgenommen werden. Passwort kann generiert werden mit:

openssl passwd -6 -stdin
