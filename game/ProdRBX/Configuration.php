<?php
$baseUrl = "http://localhost:53640";
$domainUrl ="localhost:53640";

//for ios/android, it allows you to disable that annoying "Upgrade Me" popup
$allowedVersions = array('AppAndroidV2.235.71216.1','AppiOSV2.126.39527','AppiOSV2.1','AppAndroidV1.0','AppiOSV2.138.43584','AppiOSV2.165.50938','AppiOSV2.234.70730','AppiOSV2.197.60133','AppiOSV2.172.52864','AppiOSV2.2.2','AppiOSV2.3.1','AppiOSV2.4.1','AppiOSV2.8.6','AppiOSV2.10.1','AppiOSV2.5.1','AppiOSV2.127.39818');
$rbxUserAgent = array('Mozilla/5.0 (iPhone; iPhone6,1; CPU iPhone OS 7.0.6 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.126.39527','Mozilla/5.0 (iPhone; iPhone3,1; CPU iPhone OS 7.1.2 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.165.50938', 'Mozilla/5.0 (iPhone; iPhone3,1; CPU iPhone OS 7.1.2 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.234.70730 Hybrid','Mozilla/5.0 (iPhone; iPhone3,2; CPU iPhone OS 7.1.2 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.197.60133 Hybrid','Mozilla/5.0 (iPhone; iPhone3,2; CPU iPhone OS 7.1.2 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.172.52864','Mozilla/5.0 (iPhone; iPhone6,1; CPU iPhone OS 7.0.6 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.234.70730 Hybrid','Mozilla/5.0 (iPhone; iPhone6,1; CPU iPhone OS 7.0.6 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.197.60133 Hybrid','Mozilla/5.0 (iPhone; iPhone6,1; CPU iPhone OS 7.0.6 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.234.70730 Hybrid','Mozilla/5.0 (iPhone; iPhone3,2; CPU iPhone OS 7.1.2 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.4.1','Mozilla/5.0 (iPhone; iPhone3,2; CPU iPhone OS 6.1.3 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.10.1','Mozilla/5.0 (iPhone; iPhone3,2; CPU iPhone OS 6.1.3 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.5.1','Mozilla/5.0 (iPhone; iPhone3,2; CPU iPhone OS 6.1.3 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 ROBLOX iOS App 2.127.39818');
$allowedmd5hashes = array('2b4ba7fc-5843-44cf-b107-ba22d3319dcd');

$hostdb = "localhost";
$accdb = "root";
$passdb = "";
$namedb = "prodrbx";

$SignType = 1; // 1 for rbxsig, 2 for no rbxsig
$Offline = false;
$CurrPage = $_SERVER["REQUEST_URI"];
$StarterID = 20; //Put in here your starterscript's asset id!
$AssetRedirect = false;
$CurrentVersion = "version-27973050fb3b494f";

$AdminList = array("1", "2", "-1");

switch($Offline){
	case true:
		switch ($CurrPage){
			case ($CurrPage !== "/IDE/Maintenance.ashx"):
				header("Location: ". $baseUrl . "/IDE/Maintenance.ashx");
				die();
				break;
		}
		break;
}

?>
