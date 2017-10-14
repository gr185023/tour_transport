<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (isset($_POST["distance"])) {
	$_SESSION['distance'] = $_POST["distance"];
}

if (isset($_POST["platlng"])) {
	$_SESSION['platlng'] = $_POST["platlng"];
}

if (isset($_POST["dlatlng"])) {
	$_SESSION['dlatlng'] = $_POST["dlatlng"];
}

?>