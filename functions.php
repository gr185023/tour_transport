<?php

///////////// DATABASE //////////////////

function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. 
        $config = parse_ini_file('conf/config.ini'); 
        $connection = mysqli_connect($config['host'],$config['username'],$config['password'],$config['dbname']);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error(); 
    }
    return $connection;
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

function db_select($query) {
    $rows = array();
    $result = db_query($query);

    // If query failed, return `false`
    if($result === false) {
        return false;
    }

    // If query was successful, retrieve all the rows into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

function db_escape_string($value) {
	$connection = db_connect();
    return mysqli_real_escape_string($connection,$value);
}

/////////////// END DATABASE /////////////////////



function calculateEstimate($distance, $sedanCount, $vanCount, $tourType) {
    $kms = $distance / 1000;
    $vanPrice;
    $sedanPrice;
    $flagDownVan = 650;
    $flagDownCar = 450;
    $percRate = 0.35; //default

    if($kms < 20) { $percRate = 1; }

    if($tourType == "2") { // One-way trip
        $vanPrice = round($flagDownVan + (430 * ($kms/10)), 2); 
        $sedanPrice = round($flagDownCar + (360 * ($kms/10)), 2);
    }
    else { // Round trip
        $vanPrice = round((((430 * $percRate) + 430) * ($kms/10)) + $flagDownVan, 2); 
        $sedanPrice = round((((360 * $percRate) + 360) * ($kms/10)) + $flagDownCar, 2);
    }

    $subtotal = ($vanPrice * floatval($vanCount)) + ($sedanPrice * floatval($sedanCount));

    return round($subtotal);
}

function makeBuyButton($downPayment = 0, $remainingBalance = 0, $txt = "Get it!")
{
	 // Load configuration as an array. 
    $config = parse_ini_file('conf/config.ini'); 

	$PF_USER = $config['pf_user'];
	$PF_VENDOR = $config['pf_vendor'];
	$PF_PARTNER = $config['pf_partner'];
	$PF_PWD = $config['pf_pwd'];
	$PF_MODE = $config['pf_mode'];
	$PF_HOST_ADDR = $config['pf_host_addr']; 

	$secureTokenId = uniqId('', true);

	$postData = "USER=" . $PF_USER
			.	"&VENDOR=" . $PF_VENDOR
			.	"&PARTNER=" . $PF_PARTNER
			.	"&PWD=" . $PF_PWD
			.	"&CURRENCY=" . 'PHP'
			.	"&CREATESECURETOKEN=Y"
			.	"&SECURETOKENID=" . $secureTokenId
			.	"&TRXTYPE=S"
			.	"&AMT=" .  round($downPayment);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $PF_HOST_ADDR);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_POST, TRUE);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

	$resp = curl_exec($ch);

	if(!$resp)
	{
		return "<p>To book please contact us.</p>";
	}

	parse_str($resp, $arr);

	if($arr['RESULT'] != 0)
	{
		return "<p>To order please contact us.</p>";	
	}

	return '<iframe src="https://payflowlink.paypal.com?mode=' . $PF_MODE . '&amp;SECURETOKEN=' . $arr['SECURETOKEN']
		. '&amp;SECURETOKENID=' . $secureTokenId . '" width="490" height="565" scrolling="no" frameborder="0" border="0"
		allowtransparency="true"></iframe>';

}

?>