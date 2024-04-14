<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  </script> 
	<script type="text/javascript" src="verify.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body>


<?php
	function verifyHash() {
		$urlData = $_SERVER['REQUEST_URI']; 
		$urlDataPart = substr($urlData, 0, strlen($urlData)-15);
		$secret = "huklebukle";
		$h = hash("sha256", $urlDataPart.$secret);
		echo "urldatapart: ".$urlDataPart;

		$clientHash = $_GET['pruef'];
		if ($clientHash == substr($h,0,8)) {
			return true;
		} else {
			return false;
		}
	}

	function getParameter($paramName) {
		if (isset($_GET[$paramName])) {
			$data = $_GET[$paramName];
			$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
			return $data;
		}
		return "";
	}


	$kostenKind= getParameter('kostenKind');
	$kostenWeiteresKind = getParameter('kostenWeiteresKind');
	$kostenLeiter = getParameter('kostenLeiter');
	$startDate = getParameter('start');
	$endDate   = getParameter('end');
	$action    = getParameter('aktion');
	$place     = getParameter('ort');
	$expire    = getParameter('anmend');

	if (strtotime(date('Y-m-d')) > strtotime($expire) || $expire == "") {
		include("toolate.php");
	} else {
		include("form.php"); 
	}

	
?>


</body>
</html>
