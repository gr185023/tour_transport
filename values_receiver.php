<?php 

if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['tt'])) {
    session_unset();
    session_destroy();
    header("location: index.php");
    die;
}
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tour Transport</title>
        <meta name="description" content="">
        <meta name="description" content="Tour Transport - Your tour! your convenience!">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Hind|Dosis" rel="stylesheet">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/materialize.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>  
    </head>
    <body>
    	<div class="container"> 
<?php

    require_once("functions.php");
    include("dist.php");

    if(!isset($_SESSION['distance'])) {
        echo "<script alert('We apologize but there seems to be an issue. We are working on it.') />";
        session_unset();
        session_destroy();
        header("location: index.php");
        die;
    }

    db_connect();

    $bookingNumber = uniqId('', true);
    $bookingDate = date("Y-m-d H:i:s");
    $currency = 'PHP'; ///-- make this dynamic
    $firstName = db_quote($_POST['firstName']);
    $lastName = db_quote($_POST['lastName']);
    $city = db_quote($_POST['city']);
    $sedanCount = db_escape_string($_POST['sedanCount']);
    $vanCount = db_escape_string($_POST['vanCount']);
    $tourType = db_quote($_POST['tourType']);
    $contact = db_quote($_POST['contact']);
    $nationality = db_quote($_POST['nationality']);
    $ageRange = db_quote($_POST['ageRange']);
    $pickupDate = db_quote($_POST['pickupDate']);
    $pickupTime = db_quote($_POST['pickupTime']);
    $email = db_quote($_POST['email']);
    $pickupLocation = db_quote($_POST['pickupLocation']);
    $pickupInstruction = db_quote($_POST['pickupInstruction']);
    $destination = db_quote($_POST['destination']);
    $destinationInstruction = db_quote($_POST['destinationInstruction']);
    $payMentType = db_quote($_POST['payGroup']);
    $downPayment = 0;
    $remainingBalance = 0;
    $subTotal = 0;
    $distance = db_escape_string($_SESSION['distance']);
    $platlng = db_quote($_SESSION['platlng']);
    $dlatlng = db_quote($_SESSION['dlatlng']);

    $subTotal = calculateEstimate($distance, $sedanCount, $vanCount, $tourType);
    if(strcmp($_POST['payGroup'],"ten") == 0) { // 10%
        $downPayment = round($subTotal * 0.1);
        $remainingBalance = $subTotal - $downPayment;
    }
    else { //full payment
        $downPayment = $subTotal;
        $remainingBalance = 0.00;
    }

    // Insert the values into the database
    $query = "INSERT INTO client (booking_number,booking_date,currency,city,sedan_count,van_count,tour_type,firstname,lastname,contact_number,nationality,age_range,email,pickup_date,pickup_time,pickup_location,pickup_instruction,destination,destination_instruction,pickup_lat_lng,destination_lat_lng,remaining_balance,down_payment) VALUES ('" . $bookingNumber . "','" . $bookingDate . "','" . $currency . "'," . $city . "," . $sedanCount . "," . $vanCount . "," . $tourType . "," . $firstName . "," . $lastName . "," . $contact . "," . $nationality . "," . $ageRange . "," . $email . "," . $pickupDate . "," . $pickupTime . "," . $pickupLocation . "," . $pickupInstruction . "," . $destination . "," . $destinationInstruction . "," . $platlng . "," . $dlatlng . "," . $remainingBalance . "," . $downPayment . ")";
    
    $result = db_query($query);
    if($result === false) {
        // Handle failure - log the error, notify administrator, etc.
        $error = db_error();
    }

	// $vanCount = 0;
	// $sedanCount = 1;
	// $tourType = 0;

	// if(isset($_POST['vanCount'])) $vanCount = $_POST['vanCount'];
	// if(isset($_POST['sedanCount'])) $sedanCount = $_POST['sedanCount'];
	// if(isset($_POST['tourType'])) $tourType = $_POST['tourType'];

    ///-- temp or perm?
    sleep(2);

    session_unset();
    session_destroy();

    if(!isset($error)) {
    	$textBuyButton = makeBuyButton($downPayment, $remainingBalance, "GET IT!");
    	echo $textBuyButton;
    }
    else {
        echo "<script> alert('We apologize but there seems to be an issue booking your tour. Please try to book it again. If
            you continue to experience this issue. Please call or email as at support@funtour.ph'); </script>";
        header("location: index.php");
        die;
    }
?>
</div>
<!-- footer -->
        <div class="footer z-depth-1">
            <div class="footer-icons">
                <!-- <i class="ion-social-facebook"></i>
                <i class="ion-social-pinterest"></i>
                <i class="ion-social-instagram"></i>
                <i class="ion-social-linkedin"></i>
                <i class="ion-social-googleplus"></i>
                <i class="ion-social-twitter"></i>
                <i class="ion-social-github"></i> -->
            </div>
            <div class="copyrights">
            <p>Copyrights &copy 2017. All rights reserved.</p>
            </div>
        </div>
        <!-- end of footer -->

        <!--script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script-->
        <script src="js/plugins.js"></script>
        <script src="js/vendor/materialize.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/vendor/jquery.geocomplete.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;libraries=places,geometry&amp;key=AIzaSyCrjyb-LnK_jeqCM5-G8LWxvZ7IMiwoz1I"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>