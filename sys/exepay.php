<?php
require_once("functions.php");

$access_token= $_GET['access_token'];
$paypalMode = $_GET['paypalMode'];
$payerId = $_GET['payerId'];
$paymentID = $_GET['paymentID'];
// custom iceberg9
$urlFinal = $_GET['redirectShopy'];
$accountID = $_GET['accountID'];
$reference = $_GET['reference'];
$currencyShopy = $_GET['currencyShopy'];
$modeShopy = $_GET['modeShopy'];
$amountShopy = $_GET['amountShopy'];
$gateRef = $_GET['gateRef'];
$timeStamp = $_GET['timeStamp']; 
$signature = $_GET['signature'];

// end custom

	if ($paypalMode=="sandbox") {
    	$host = 'https://api.sandbox.paypal.com';
	}
	if ($paypalMode=="live") {
   		$host = 'https://api.paypal.com';
	}
#GET ACCESS TOKEN
$url = $host.'/v1/payments/payment/'.$paymentID.'/execute/'; 
$execute = '{"payer_id" : "'.$payerId.'"}';
$json_resp = executing_payment($url, $execute,$access_token);
$json_resp = stripslashes(json_format($json_resp));
?>

<html>
<head>
    <title>PayPal Plus - by PayPal.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,300,600,200' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="Shop_files/index.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="shortcut icon" href="Shop_files/pp_favicon_x.ico">
</head>
<body>

<header>
    <div class="container">
        <div class="col-xs-12">
            <img src="Shop_files/logo_ppp.svg" alt="PayPal Plus México">
        </div>
    </div>
    
</header>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div id="middle-bar">

                <?php
                    //echo $json_resp;
                    $resP = json_decode($json_resp);

                    //echo $resP->state
                    //$respuesta = $resP->name
                    //echo $respuesta;
                    
                    /*
                    if ($resP->name == 'PAYMENT_ALREADY_DONE') {
                        //echo $urlFinal;
                        $until = substr($urlFinal, 0, strrpos($urlFinal, "/"));
                        //echo $until;
                        echo '<script language="javascript">window.location="';
                        echo $until;
                        echo '/thank_you"</script>';
                    }
                    */
                    /*
                    $urlFinal = $_GET['redirectShopy'];
                    $accountID = $_GET['accountID'];
                    $reference = $_GET['reference'];
                    $currencyShopy = $_GET['currencyShopy'];
                    $modeShopy = $_GET['modeShopy'];
                    $amountShopy = $_GET['amountShopy'];
                    $gateRef = $_GET['gateRef'];
                    $timeStamp = $_GET['timeStamp'];
                    $signature = $_GET['signature'];
                    */
                    

                    if ($resP->state == 'approved') {
                        echo '<h1>Transacción Exitosa</h1>';
                        echo '<p>Redireccionando, espere un momento</p>';
                        //echo $urlFinal;
                        ////$until = substr($urlFinal, 0, strrpos($urlFinal, "/"));
                        //echo $until;
                        echo '<script language="javascript">setTimeout(function(){ window.location="';
                        //echo $until;
                        echo 'https://paypalplusmx.herokuapp.com/sys/callback.php?x_complete=' . $urlFinal .'&x_account_id=' . $accountID . '&x_reference=' . $reference . '&x_amount=' . $amountShopy .'';
                        echo '"}, 4000);</script>';
                    } else {
                        echo '<script language="javascript">window.location="';
                        echo 'https://paypalplusmx.herokuapp.com/error.html';
                        echo '"</script>';
                    }

                    // /thank_you
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>