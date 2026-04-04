<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  </script>
	<script type="text/javascript" src="verify.js"></script>
	<link rel="stylesheet" href="../style.css">
</head>

<body>


<?php
$filename = $_GET['file'] ?? '';

// Nur erlaubte Zeichen zulassen (Buchstaben, Zahlen, Unterstrich, Minus, Punkt)
$filename = basename($filename); // Entfernt Pfade wie ../../
$filename = preg_replace('/[^a-zA-Z0-9._-]/', '', $filename);

// Optional: Nur bestimmte Endungen erlauben
if (!preg_match('/\.csv$/i', $filename)) {
    die("Ungültiger Dateiname");
}

// Datei nur aus einem festen Ordner laden
$baseDir = dirname(__DIR__)."/data/";
$fullPath = realpath($baseDir . $filename);

// Prüfen, ob die Datei wirklich im erlaubten Ordner liegt
if ($fullPath === false || strpos($fullPath, $baseDir) !== 0) {
   die("Zugriff verweigert");
}



$csvDatei = $fullPath;

if (($handle = fopen($csvDatei, "r")) !== false) {

    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    $columns = [0, 21];


    if (($daten = fgetcsv($handle, 1000, ";", "\"", "\\")) !== false) {
        echo "<tr>";
        foreach ($daten as $wert) {
            echo "<th>" . htmlspecialchars($wert) . "</th>";
        }
        echo "</tr>";       
    }

    while (($daten = fgetcsv($handle, 1000, ";", "\"", "\\")) !== false) {
        echo "<tr>";
        foreach ($daten as $wert) {
            echo "<td>" . htmlspecialchars($wert) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    fclose($handle);
} else {
    echo "CSV-Datei konnte nicht geöffnet werden.";
}
?>


</body>

</html>
