<?php
$to = "rmg.tour.transport@gmail.com";
$subject =  "[FUNTOUR] " . $_REQUEST['subject'] . "[" . $_REQUEST['bookingNumber'] . "]";

$message = $_REQUEST['ttname'] . "[" . $_REQUEST['email'] . "/" . $_REQUEST['telephone'] . "] - " . $_REQUEST['ttmessage']; ///-- make HTML format

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <contact.us@funtour.ph>' . "\r\n";

mail($to,$subject,$message,$headers);

echo "Your concern has been sent. Thank you for choosing Cellcom Central!";
?>

