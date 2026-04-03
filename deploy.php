<?php
$secret = "MEIN_GEHEIMNIS";

$payload = file_get_contents("php://input");
$signature = "sha256=" . hash_hmac("sha256", $payload, $secret);

if (!hash_equals($signature, $_SERVER["HTTP_X_HUB_SIGNATURE_256"])) {
    http_response_code(403);
    exit("Invalid signature");
}

$data = json_decode($payload, true);

// Nur reagieren, wenn auf master gepusht wurde
if ($data["ref"] !== "refs/heads/master") {
    exit("Not master branch");
}

exec("/mnt/web110/d2/53/511833653/htdocs/anmelden/deploy.sh 2>&1", $output);
echo implode("\n", $output);

?>