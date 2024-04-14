# pfila-anmeldung
Sammlung von PHP Skripten, die Anmeldeformulare für Zeltlager etc. bereitstellen.


# Neue Nutzer für Admin Zugang erstellen
Zugriff auf Admin Zugang wird per .htaccess beschränkt. Um einen neuen Nutzer hinzuzufügen muss er in .htpasswd aufgenommen werden. Passwort kann generiert werden mit:

openssl passwd -6 -stdin