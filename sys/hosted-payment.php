<?php

require_once("functions.php");
header('content-type: text/html; charset: utf-8');

# Get form data
/// Customs
$okiURL=$_REQUEST['urlShopyComplete'];
$accountIdShopy=$_REQUEST['accountIdShopy'];
$referenceShopy=$_REQUEST['referenceShopy'];
$currencyShopy=$_REQUEST['currencyShopy'];
//$testShopy=$_REQUEST['testShopy'];
$testShopy='false';
$amountShopy=$_REQUEST['amountShopy'];
$gatewayReferenceShopy=$_REQUEST['gatewayReferenceShopy'];
$timestampShopy=$_REQUEST['timestampShopy'];
$signatureShopy=$_REQUEST['signatureShopy'];
//
$shopName=$_REQUEST['shopName'];
$itemName=$_REQUEST['itemName'];
$itemDescription=$_REQUEST['itemDescription'];
$itemSku=$_REQUEST['itemSku'];
$itemPrice=$_REQUEST['itemPrice'];
$itemQuantity=$_REQUEST['itemQuantity'];
$payerEmail=$_REQUEST['payerEmail'];
$payerPhone=$_REQUEST['payerPhone'];
$payerFirstName=$_REQUEST['payerFirstName'];
$payerLastName=$_REQUEST['payerLastName'];
//$payerTaxId=$_REQUEST['payerTaxId'];
//$payerTaxIdType=$_REQUEST['payerTaxIdType'];
$shippingAddressRecipient=$_REQUEST['shippingAddressRecipient'];
$shippingAddressStreet1=$_REQUEST['shippingAddressStreet1'];
$shippingAddressStreet2=$_REQUEST['shippingAddressStreet2'];
$shippingAddressPostal=$_REQUEST['shippingAddressPostal'];
$shippingAddressCity=$_REQUEST['shippingAddressCity'];
$shippingAddressCountry=$_REQUEST['shippingAddressCountry'];
$shippingAddressState=$_REQUEST['shippingAddressState'];
$disallowRememberedCards=$_REQUEST['disallowRememberedCards'];
$rememberedCards=$_REQUEST['rememberedCards'];
$button=$_REQUEST['button'];
$disableButton=$_REQUEST['disableButton'];
$checkout=$_REQUEST['checkout'];
$preselection=$_REQUEST['preselection'];
$surcharging=$_REQUEST['surcharging'];
$hideAmount=$_REQUEST['hideAmount'];
$userAction=$_REQUEST['userAction'];
$shopBackgroundStyle=$_REQUEST['shopBackgroundStyle'];
$allowPatchPaymentBeforeApproval=$_REQUEST['allowPatchPaymentBeforeApproval'];
$allowPatchPaymentThroughExecution=$_REQUEST['allowPatchPaymentThroughExecution'];
$paypalMode=$_REQUEST['paypalMode'];
$thirdPartyPaymentMethods=$_REQUEST['thirdPartyPaymentMethods'];
$customization=$_REQUEST['customization'];
$endpoint=$_REQUEST['endpoint'];
$clientId=$_REQUEST['clientId'];
$secret=$_REQUEST['secret'];
$experience_profile_id=$_REQUEST['experience_profile_id'];
$returnUrl=$_REQUEST['returnUrl'];
$cancelUrl=$_REQUEST['cancelUrl'];
$ppplusBaseUrl=$_REQUEST['ppplusBaseUrl'];
$ppplusJsLibraryUrl=$_REQUEST['ppplusJsLibraryUrl'];
$ppplusJsLibraryCountry=$_REQUEST['ppplusJsLibraryCountry'];
$ppplusJsLibraryLang=$_REQUEST['ppplusJsLibraryLang'];
$currency=$_REQUEST['currency'];
$passCallbacksForThirdPartyPaymentMethodSelection=$_REQUEST['passCallbacksForThirdPartyPaymentMethodSelection'];
$simulateConfError=$_REQUEST['simulateConfError'];
$enableConsoleLog=$_REQUEST['enableConsoleLog'];
$merchantAccountNo=$_REQUEST['merchantAccountNo'];
$ppplusBuyerEmail=$_REQUEST['ppplusBuyerEmail'];
$checkoutUrl=$_REQUEST['checkoutUrl'];
$sslVersion=$_REQUEST['sslVersion'];
$sslVerifyHost=$_REQUEST['sslVerifyHost'];
$sslVerifyPeer=$_REQUEST['sslVerifyPeer'];
$bootstrapCss=$_REQUEST['bootstrapCss'];
$bootstrapJs=$_REQUEST['bootstrapJs'];
$jqueryJs=$_REQUEST['jqueryJs'];
$template=$_REQUEST['template'];
$iframeHeight=$_REQUEST['iframeHeight'];
$merchantInstallmentSelection=$_REQUEST['merchantInstallmentSelection'];
$merchantInstallmentSelectionOptional=$_REQUEST['merchantInstallmentSelectionOptional'];

//$total = $itemPrice * $itemQuantity;
$total = $itemPrice;

if ($paypalMode=="sandbox") {
    $host = 'https://api.sandbox.paypal.com';
}
if ($paypalMode=="live") {
    $host = 'https://api.paypal.com';
}
#GET ACCESS TOKEN
$url = $host.'/v1/oauth2/token'; 
$postArgs = 'grant_type=client_credentials';
$token = get_access_token($url,$postArgs);
$access_token= get_access_token($url,$postArgs);

#CREATE PAYMENT
$url = $host.'/v1/payments/payment';
$payment = '{
"intent":"sale",
"payer":{
"payment_method":"paypal"
},
"transactions":[
{
"amount":{
"currency":"'.$currency.'",
"total":"'.$total.'",
"details":{

}
},
"description":"This is the payment transaction description",
"payment_options":{
"allowed_payment_method":"IMMEDIATE_PAY"
},
"item_list":{
"shipping_address": {
"recipient_name" : "'.$shippingAddressRecipient.'", "line1": "'.$shippingAddressStreet1.'", "line2": "'.$shippingAddressStreet2.'",
"city": "'.$shippingAddressCity.'",
"country_code": "'.$shippingAddressCountry.'", "postal_code": "'.$shippingAddressPostal.'",
"state": "'.$shippingAddressState.'", "phone": "'.$payerPhone.'"
},
"items":[
{
"name":"'.$itemName.'",
"description":"'.$itemDescription.'",
"quantity":"'.$itemQuantity.'",
"price":"'.$itemPrice.'",
"sku":"'.$itemSku.'",
"currency":"'.$currency.'"
}
]
}
}
],
"redirect_urls":{
"return_url":"https://www.example.com",
"cancel_url":"https://www.example.com"
}
}
';

//var_dump ($json);
//die(payment);
$json_resp = make_post_call($url, $payment);

#Get the token out of the response array (for later use)
 $token = substr($json_resp['links']['1']['href'],-20);

$paymentID = ($json_resp['id']);

#Put JSON in a nice readable format
$json_resp = stripslashes(json_format($json_resp));


?>
<html>
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paypal Plus con Tarjeta de Crédito / Débito</title>

    <link rel="stylesheet" type="text/css"
        href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="Shop_files/shop.css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="Shop_files/pp_favicon_x.ico">
</head>
<body id="debug">
<div style="display: none;" id="paypal-config"
    data-checkout="inline"
    data-checkout-url="http://paypalplussampleshopbr-sandbox-9451.ccg21.dev.paypalcorp.com/PayPalPlusSampleShop-br/checkout-now"
></div>


<div class="container">

<div class="row" style="">

    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div id="box">
        
        <div class="row">

            <div class="col-xs-12">
                <div style="text-align: center; margin-bottom:30px;">
                    <img src="Shop_files/logo_gateway.png" alt="Shopify Plus // Tarjeta Débito y Crédito">
                </div>
            </div>

            <form method="post" class="horizontal-form" action="?action=inline"
                id="checkout-form" onSubmit="return false;"
                data-checkout="inline">

            <div class="col-xs-12">

                <div id="resumen-order" style="margin-bottom:40px;">
                    <div class="form-group" id="shipping-address-group">
                        <h4 style="color:#575757; font-size:20px;">Resumen de su Pedido</h4>
                        <table class="table table-striped" style="text-align:center; font-size:1em;">
                            <thead>
                                <tr>
                                    <th style="color:#575757; text-align:center;">Tienda</th>
                                    <th style="color:#575757; text-align:center;">Numero de Pedido</th>
                                    <th style="color:#009cde; text-align:center;"><strong>Total</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $shopName ?></td>
                                    <td><?php echo $itemDescription ?></td>
                                    <td style="color:#009cde;"><strong>$<?php echo $total ?> MXN</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="iframe-awesome">
                    <h4 style="color:#575757; font-size:20px;">Ingresa los datos de su tarjeta</h4>

                    <div id="psp-group">

                        <div id="pppDiv"> <!-- the div which id the merchant reaches into the clientlib configuration -->
                            <script type="text/javascript">
                                document.write("iframe is loading...");
                            </script>
                            <noscript> <!-- in case the shop works without javascript and the user has really disabled it and gets to the merchant's checkout page -->
                                <iframe src="https://www.paypalobjects.com/webstatic/ppplusbr/ppplusbr.min.js/public/pages/pt_BR/nojserror.html" style="max-height: 400px; border: none;"></iframe>
                            </noscript>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-xs-12">
                <p style="display:none"><strong>The outside continue button:</strong></p>
                <button
                  type="submit"
                  id="continueButton"
                  class="btn btn-lg btn-primary btn-block infamous-continue-button btn-paypal"
                  onclick="ppp.doContinue(); return false;">
                    
                    Continuar
                </button>
                <a id="payNowButton" class="btn btn-lg btn-primary btn-block infamous-continue-button btn-paypal btn-redsito hidden" href="?action=commit">Pagar Ahora</a>
            </div>

        </div><!-- row inter -->
        </div><!-- box -->

        <footer>
            <ul>
                <li><a href="https://www.paypal.com/us/webapps/mpp/about" target="_blank">Acerca de PayPal</a></li>
                <li><a href="https://www.paypal.com/selfhelp/home" target="_blank">Contactar</a></li>
                <li><a href="https://www.paypal.com/mx/webapps/mpp/ua/privacy-full" target="_blank">Privacidad</a></li>
                <li><a href="https://www.paypal.com/mx/webapps/mpp/ua/legalhub-full" target="_blank">Acuerdos legales</a></li>
            </ul>
        </footer>

    </div>


<?php /*
<!-- Detalles de compra -->

<div class="col-md-6">

<h2>Detalles de Compra</h2>

    <div class="form-group" id="shipping-address-group">
        <label class="control-label">Carrito de Compra</label>
        <table class="table table-striped">
            <tr>
                <td>Árticulo</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Subtotal</td>
            </tr>

                <tr>
                    <td><?php echo $itemName?></td>
                    <td><?php echo $itemQuantity?></td>
                    <td>$<?php echo $itemPrice?> MXN</td>
                    <td>$<?php echo $total?> MXN</td>
                </tr>
        </table>
        <label class="control-label">Total: <?php echo $total?> MXN</label>
    </div>

    <div class="form-group" id="shipping-address-group">
        <label class="control-label">Dirección de Envío:</label>
        <table class="table table-striped">
            <tr>
                <td>Nombre del destinatario:</td>
                <td><?php echo $payerFirstName ." " . $payerLastName ?></td>
            </tr>
            <tr>
                <td>Dirección 1:</td>
                <td><?php echo $shippingAddressStreet1 ?></td>
            </tr>
            <tr>
                <td>Direccion 2:</td>
                <td><?php echo $shippingAddressStreet2 ?></td>
            </tr>
            <tr>
                <td>Código Postal:</td>
                <td><?php echo $shippingAddressPostal ?></td>
            </tr>
            <tr>
                <td>Ciudad:</td>
                <td><?php echo $shippingAddressCity ?></td>
            </tr>
            <tr>
                <td>Estado:</td>
                <td><?php echo $shippingAddressState ?></td>
            </tr>
            <tr>
                <td>Código de País:</td>
                <td><?php echo $shippingAddressCountry ?></td>
            </tr>
        </table>

    </div>

    <div class="form-group" id="shipping-options-group" style="display:none">
        <label class="control-label">Shipping Options:</label>
            <table class="table table-striped">
                <tr>
                    <td>express shipping:</td>
                    <td>off</td>
                </tr>
            </table>

    </div>

    <br />

</div>

<!-- END Detalles de compra -->

<!-- Iframe -->

<div class="col-md-6">

<h2>Ingresa los datos de su tarjeta</h2>

<div class="form-group" id="psp-group">
    <label class="control-label"></label>

    <div class="panel">
        <div class="panel-body">
            <div id="pppDiv"> <!-- the div which id the merchant reaches into the clientlib configuration -->
                <script type="text/javascript">
                    document.write("iframe is loading...");
                </script>
                <noscript> <!-- in case the shop works without javascript and the user has really disabled it and gets to the merchant's checkout page -->
                    <iframe src="https://www.paypalobjects.com/webstatic/ppplusbr/ppplusbr.min.js/public/pages/pt_BR/nojserror.html" style="height: 400px; border: none;"></iframe>
                </noscript>
            </div>
        </div>
    </div>

</div>


</div>

<!-- END Iframe -->

    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <p style="display:none"><strong>The outside continue button:</strong></p>
        <button
          type="submit"
          id="continueButton"
          class="btn btn-lg btn-primary btn-block infamous-continue-button"
          onclick="ppp.doContinue(); return false;">
            
            Continuar
        </button>
        <a id="payNowButton" class="btn btn-lg btn-primary btn-block infamous-continue-button hidden" href="?action=commit">Pagar Ahora</a>
    </div>

*/ ?>


    </form>

</div><!-- row -->

<div style="display:none;">
    <div class="col-md-12">
    <hr />

        <h2>Developer Info</h2>
        <p><strong><code>The iframe response is : <code/><strong/></p>
        <div id="installments" ></div>
        <pre id="installmentsJson" class="json-data">{"result": "no data yet"}</pre>
        <div id="responseDiv"></div>
        <pre id="responseJson" class="json-data">{"result": "no data yet"}</pre>

    <h3>General information</h3>

    <p>The approval_url is:
        <strong><code>https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&amp;token=<?php echo $token;?></code></strong></p>
    <p>The EC-Token is:
        <strong><code><?php echo $token;?></code></strong></p>
    <p>The Payment-ID is:
        <strong><code><?php echo $paymentID;?></code></strong></p>

    <h3>The payment created:
    </h3>
    <pre class="json-data"><?php echo $json_resp;?></pre>
    </div>
</div>
<script src="<?php echo $ppplusJsLibraryUrl;?>"></script>
<script>

    function clearConsoleOutput(){
        jQuery("#outputOfCallbacksForThirdPartyPaymentMethodSelection").text("");
        jQuery("#outputOfCallbacksForThirdPartyPaymentMethodDeselection").text("");
    }

    var ppp = PAYPAL.apps.PPP({

        approvalUrl: "<?php echo $host;?>/cgi-bin/webscr?cmd=_express-checkout&token=<?php echo $token;?>",

        buttonLocation: "<?php echo $button;?>",
        preselection: "none",
        surcharging: false,
        hideAmount: false,
        placeholder: "pppDiv",

        disableContinue: "continueButton",
        enableContinue: "continueButton",

        // merchant integration note:
        // this is executed when the iframe posts the "checkout" action to the library
        // the merchant can do an ajax call to his shop backend to save the remembered cards token
        onContinue: function (rememberedCards, payerId, token, term) {
            console.log(term);
            // TODO: remove payNowButton
            $('#payNowButton').removeClass('hidden');
            $('#continueButton').addClass('hidden');
            var access_token = "<?php echo $access_token; ?>";
            var paymentID = "<?php echo $paymentID; ?>";
            var paypalMode = "<?php echo $paypalMode; ?>";
            // custom
            var okShopy = "<?php echo $okiURL; ?>";
            var acountShopy = "<?php echo $accountIdShopy; ?>";
            var referenceShopy = "<?php echo $referenceShopy; ?>";
            var currencyShopy = "<?php echo $currencyShopy; ?>";
            var testShopy = "<?php echo $testShopy; ?>";
            var amountShopy = "<?php echo $amountShopy; ?>";
            var gateRefShopy = "<?php echo $gatewayReferenceShopy; ?>";
            var timeShopy = "<?php echo $timestampShopy; ?>";
            var signatureShopy = "<?php echo $signatureShopy; ?>";
            // end custom
            var payURL = "ExecutePayment.php?access_token=" + access_token + "&payerId=" + payerId + "&paymentID=" + paymentID + "&paypalMode=" + paypalMode + "&redirectShopy=" + okShopy + "&accountID=" + acountShopy + "&reference=" + referenceShopy + "&currencyShopy=" + currencyShopy + "modeShopy=" + testShopy + "&amountShopy=" + amountShopy + "&gateRef=" + gateRefShopy + "&timeStamp" + timeShopy + "&signature=" + signatureShopy;
            $('#payNowButton').prop('href', payURL);
            
            document.getElementById("installmentsJson").innerHTML = (term ? "<p><strong><code id='installmentsText'>"+ JSON.stringify(term) +"</code></strong></p>" : "No installments option selected");
           
		    document.getElementById("responseJson").innerHTML = JSON.stringify('Success');
            if(rememberedCards) {
            
			document.getElementById("responseDiv").innerHTML = "<p><strong><code>Transaction has been approved</code></strong></p>"+
                "<p><strong><code id='rememberedCardsText'>user token (remembered cards) = "+ rememberedCards +"</code></strong></p>";

            } else {
             //   document.getElementById("responseDiv").innerHTML = "<p><strong><code>Transaction has been approved</code></strong></p>";
            }

            // TODO: use this instead of payNowButton
            /*var url = "http://paypalplussampleshopbr-sandbox-9451.ccg21.dev.paypalcorp.com/PayPalPlusSampleShop-br/" +
                                  "?action=commit&PayerID=" + payerId + "&token=" + token +
                                  "&rememberedCards=" + rememberedCards + "&installmentOption=" + (term ? JSON.stringify(term.result) : "Single");
            window.top.location = url;
            */
        },

        thirdPartyPaymentMethods: [{"redirectUrl": "http://google.com", "methodName": "GOOGLE", "imageUrl": "https://www.google.com/logos/doodles/2014/world-cup-2014-11-6294918834159616.3-hp.gif", "description": "my super duper description"},{"redirectUrl": "http://google.com", "methodName": "Barzahlung bei Abholung", "description": "(zzgl. 2 % Servicepauschale)"},{"redirectUrl": "http://google.com", "methodName": "G&ouml;&ouml;gl&egrave;", "description": "This is Gö&ouml;gl&egrave;'s description"}],


        language: "<?php echo $ppplusJsLibraryLang; ?>",
        country: "<?php echo $shippingAddressCountry; ?>",
        disallowRememberedCards: "<?php echo $disallowRememberedCards; ?>",
        rememberedCards: "<?php echo $rememberedCards; ?>",
        mode: "<?php echo $paypalMode; ?>",
        useraction: "continue",
        payerEmail: "<?php echo $payerEmail; ?>",
        payerPhone: "<?php echo $payerPhone; ?>",
        payerFirstName: "<?php echo $payerFirstName; ?>",
        payerLastName: "<?php echo $payerLastName; ?>",
        payerTaxId: "",
        payerTaxIdType: "",
        merchantInstallmentSelection: "<?php echo $merchantInstallmentSelection; ?>",
        merchantInstallmentSelectionOptional:"<?php echo $merchantInstallmentSelectionOptional; ?>",
        iframeHeight: "474"
        
    });
</script>

<style>
    .hidden {display:none;}
</style>
<div class="row" style="display:none">
    <div class="col-md-12">
    <hr />
    <footer>PayPal Plus Sample Shop</footer>
    </div>
</div>


<!--<div id="sessionInfoDrawer" class="closed">-->
<!--    Session Info-->
<!--</div>-->
<!--<div id="sessionInfo">-->
<!--    <div>-->
<!---->
<!--<h2>Current $_POST</h2>-->
<!--<dl>-->
<!--    <dt>--><!--</dt>-->
<!--    <dd>--><!--</dd>-->
<!--</dl>-->
<!---->
<!--<h2>Cookies</h2>-->
<!--<dl>-->
<!--    <dt>--><!--</dt>-->
<!--    <dd>--><!--</dd>-->
<!--</dl>-->
<!---->
<!--<h2>Session</h2>-->
<!--<dl>-->
<!--    <dt>--><!--</dt>-->
<!--    <dd>--><!--</dd>-->
<!--</dl>-->
<!---->
<!--    </div>-->
<!--</div>-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$("#debug").on("click", function (e) {
    $('.open').toggleClass('open closed');
});
$("#sessionInfo").on("click", function (e) {
    e.stopPropagation();
});
$("#sessionInfoDrawer").on("click", function (e) {
    e.stopPropagation();
    $(this).toggleClass('closed open');
});
</script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="Shop_files/sample_shop.js"></script>

</body>
</html>

