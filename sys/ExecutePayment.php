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

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkout</title>

    <link rel="stylesheet" type="text/css"
        href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="./Shop_files/shop.css" />
</head>

<body>
<div>
    <div class="col-md-12">
    <h2 style="display:none;">The payment response:
    </h2>

    <pre class="json-data" style="display:none;"><?php echo $json_resp;?></pre>

    <?php
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

        $urlFinal = $_GET['redirectShopy'];
        $accountID = $_GET['accountID'];
        $reference = $_GET['reference'];
        $currencyShopy = $_GET['currencyShopy'];
        $modeShopy = $_GET['modeShopy'];
        $amountShopy = $_GET['amountShopy'];
        $gateRef = $_GET['gateRef'];
        $timeStamp = $_GET['timeStamp'];
        $signature = $_GET['signature'];
        

        if ($resP->state == 'approved') {
            echo 'Redireccionando...';
            //echo $urlFinal;
            ////$until = substr($urlFinal, 0, strrpos($urlFinal, "/"));
            //echo $until;
            echo '<script language="javascript">window.location="';
            //echo $until;
            echo 'https://iceberg9.com/paypal/sys/callback.php?x_complete=' . $urlFinal .'&x_account_id=' . $accountID . '&x_reference=' . $reference . '&x_amount=' . $amountShopy .'';
            echo '"</script>';
        } else {
            echo '<h2>Error</h2>';
            echo $json_resp;
        }

        // /thank_you
    ?>
    

    </div>
</div>

</body>
</html>