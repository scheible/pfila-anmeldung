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

?>