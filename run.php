<html>
<head>
	<title>Paypal Plus | Hosted Payment SIM</title>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="sys/Shop_files/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sys/Shop_files/style.css">
</head>

<?php
	
	$x_accountID = $_POST['x_account_id'];
	$x_currency = $_POST['x_currency'];
	$x_amount = $_POST['x_amount'];
	$x_amount_shipping = $_POST['x_amount_shipping'];
	$x_amount_tax = $_POST['x_amount_tax'];
	$x_reference = $_POST['x_reference'];
	$x_shop_country = $_POST['x_shop_country'];
	$x_shop_name = $_POST['x_shop_name'];
	$x_description = $_POST['x_description'];
	$x_invoice = $_POST['x_invoice'];
	$x_test = $_POST['x_test'];
	$x_customer_first_name = $_POST['x_customer_first_name'];
	$x_customer_last_name = $_POST['x_customer_last_name'];
	$x_customer_email = $_POST['x_customer_email'];
	$x_customer_phone = $_POST['x_customer_phone'];
	$x_customer_shipping_city = $_POST['x_customer_shipping_city'];
	$x_customer_shipping_company = $_POST['x_customer_shipping_company'];
	$x_customer_shipping_address1 = $_POST['x_customer_shipping_address1'];
	$x_customer_shipping_address2 = $_POST['x_customer_shipping_address2'];
	$x_customer_shipping_state = $_POST['x_customer_shipping_state'];
	$x_customer_shipping_zip = $_POST['x_customer_shipping_zip'];
	$x_customer_shipping_country = $_POST['x_customer_shipping_country'];
	$x_customer_shipping_phone = $_POST['x_customer_shipping_phone'];
	
	$x_url_callback = $_POST['x_url_callback'];
	$x_url_cancel = $_POST['x_url_cancel'];
	$x_url_complete = $_POST['x_url_complete'];
	$x_signature = $_POST['x_signature'];

	/// Custom

	//$i_client_id = $x_accountID;
	$i_gatewayReference = 'PayPal12swr9aski8233';
	$i_mode = 'false';
	$timestamp = new DateTime('NOW');
	$i_time = $timestamp->format(DateTime::ISO8601);

?>

<body id="debug" style="display:none;">

<div style="display: none;" id="paypal-config" data-checkout="immediate" data-checkout-url="http://paypalplussampleshopbr-sandbox-9451.ccg21.dev.paypalcorp.com/PayPalPlusSampleShop-br/checkout-now"></div>

<div class="container">

<h1 class="page-header">
  PayPal Plus Sample Shop</h1>

    

<ol class="breadcrumb">
    <li>Para realizar de manera correcta la configuración para PayPal Plus, serán Requeridos de manera obligatoria el Client ID, Secret y Experience Profile</li>
</ol>

<div class="row">


<form id="paypalform" role="form" method="post" action="sys/ppp.php" class="form-horizontal" name="adjustConfiguration">
<div class="form-group pull-right">
    <a href="WebExperienceProfile.html" class="btn btn-primary" role="button">Crear o Consultar Experience Profile</a>
    <button type="submit" class="btn btn-primary">Go to checkout</button>
</div>



<div class="row">
<div class="col-md-12">



<h2>Configuration</h2>

<?php
echo 'x_url_callback: ', $x_url_callback, '<br>';
echo 'x_url_cancel: ', $x_url_cancel, '<br>';
echo 'x_url_complete: ', $x_url_complete, '<br>';
echo 'x_signature: ', $x_signature, '<br>';
echo 'x_result: ', $x_result, '<br>';
?>
<br><br>
<?php
	$r2d2 = explode('/', $x_accountID);
	echo 'cliente ID: ', $r2d2[0], '<br>';
	echo 'secret: ', $r2d2[1], '<br>';
	echo 'timeStamp: ', $i_time, '<br>';
?>
<br><br>
<?php
	//$cadena = 'x_account_iddollyx_amount10.00x_currencyMXNx_gateway_reference123x_reference5584685637x_resultcompletedx_testfalsex_timestamp2016-01-13T17:00:05Z';
	$cadena = 'x_account_id'. $x_accountID .'x_amount'. $x_amount .'x_currency'. $x_currency .'i_gateway_reference'. $i_gatewayReference .'x_reference'. $x_reference .'x_resultcompletedx_test'. $i_mode .'x_timestamp'. $i_time .'';
	$secretKey = "x099jd";
	$sigma = hash_hmac('sha256', $cadena, $secretKey);
	echo 'HMAC-SHA256: ', $sigma;
?>

<table class="table table-bordered">
			<thead>
				<tr>
					<th>KEY</th>
					<th>VALUE</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>x_secret:</td>
					<td><?php echo ':', $secret;?></td>
				</tr>
				<tr>
					<td>x_account_id:</td>
					<td><?php echo '', $x_accountID;?></td>
				</tr>
				<tr>
					<td>x_currency: </td>
					<td><?php echo '', $x_currency; ?></td>
				</tr>
				<tr>
					<td>x_amount: </td>
					<td><?php echo '', $x_amount; ?></td>
				</tr>
				<tr>
					<td>x_amount_shipping: </td>
					<td><?php echo '', $x_amount_shipping; ?></td>
				</tr>
				<tr>
					<td>x_amount_tax: </td>
					<td><?php echo '', $x_amount_tax; ?></td>
				</tr>
				<tr>
					<td>x_reference: </td>
					<td><?php echo '', $x_reference; ?></td>
				</tr>
				<tr>
					<td>x_shop_country: </td>
					<td><?php echo '', $x_shop_country; ?></td>
				</tr>
				<tr>
					<td>x_description: </td>
					<td><?php echo '', $x_description; ?></td>
				</tr>
				<tr>
					<td>x_invoice: </td>
					<td><?php echo '', $x_invoice; ?></td>
				</tr>
				<tr>
					<td>x_test: </td>
					<td><?php echo '', $x_test; ?></td>
				</tr>
				<tr>
					<td>x_customer_first_name: </td>
					<td><?php echo '', $x_customer_first_name; ?></td>
				</tr>
				<tr>
					<td>x_customer_last_name: </td>
					<td><?php echo '', $x_customer_last_name; ?></td>
				</tr>
				<tr>
					<td>x_customer_email: </td>
					<td><?php echo '', $x_customer_email; ?></td>
				</tr>
				<tr>
					<td>x_customer_phone: </td>
					<td><?php echo '', $x_customer_phone; ?></td>
				</tr>
				<tr>
					<td>x_customer_shipping_city: </td>
					<td><?php echo '', $x_customer_shipping_city; ?></td>
				</tr>
				<tr>
					<td>x_customer_shipping_address1: </td>
					<td><?php echo '', $x_customer_shipping_address1; ?></td>
				</tr>
				<tr>
					<td>x_customer_shipping_address2: </td>
					<td><?php echo '', $x_customer_shipping_address2; ?></td>
				</tr>
				<tr>
					<td>x_customer_shipping_state: </td>
					<td><?php echo '', $x_customer_shipping_state; ?></td>
				</tr>
				<tr>
					<td>x_customer_shipping_zip: </td>
					<td><?php echo '', $x_customer_shipping_zip; ?></td>
				</tr>
				<tr>
					<td>x_customer_shipping_country: </td>
					<td><?php echo '', $x_customer_shipping_country; ?></td>
				</tr>
				<tr>
					<td>x_url_callback: </td>
					<td><?php echo '', $x_url_callback; ?></td>
				</tr>
				<tr>
					<td>x_url_cancel: </td>
					<td><?php echo '', $x_url_cancel; ?></td>
				</tr>
				<tr>
					<td>x_url_complete: </td>
					<td><?php echo '', $x_url_complete; ?></td>
				</tr>
				<tr>
					<td>x_signature: </td>
					<td><?php echo '', $x_signature; ?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>

<br><br>
<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">shopName</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-shopName" name="shopName" value="<?php echo $x_shop_name; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">urlShopyComplete</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-urlShopyComplete" name="urlShopyComplete" value="<?php echo $x_url_complete; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">accountIdShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-accountIdShopy" name="accountIdShopy" value="<?php echo $x_accountID; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">referenceShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-referenceShopy" name="referenceShopy" value="<?php echo $x_reference; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">currencyShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-currencyShopy" name="currencyShopy" value="<?php echo $x_currency; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">testShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-testShopy" name="testShopy" value="<?php echo $i_mode; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">amountShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-amountShopy" name="amountShopy" value="<?php echo $x_amount; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">gatewayReferenceShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-gatewayReferenceShopy" name="gatewayReferenceShopy" value="<?php echo $i_gatewayReference; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">timestampShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-timestampShopy" name="timestampShopy" value="<?php echo $i_time; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">signatureShopy</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-resultShopy" name="resultShopy" value="<?php echo $sigma; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemName" class="col-sm-3 control-label">itemName</label>
    <div class="col-sm-7">
        <input type="text" class="form-control" id="cfgitem-itemName" name="itemName" value="<?php echo $x_shop_name; ?> | Pedido <?php echo $x_invoice; ?> ">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemDescription" class="col-sm-3 control-label">itemDescription</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-itemDescription" name="itemDescription" value="<?php echo $x_invoice; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemSku" class="col-sm-3 control-label">itemSku</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-itemSku" name="itemSku" value="<?php echo $x_invoice; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemPrice" class="col-sm-3 control-label">itemPrice</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-itemPrice" name="itemPrice" value="<?php echo $x_amount; ?>">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-itemQuantity" class="col-sm-3 control-label">itemQuantity</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-itemQuantity" name="itemQuantity" value="1">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-payerEmail" class="col-sm-3 control-label">payerEmail</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-payerEmail" name="payerEmail" value="<?php echo $x_customer_email; ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-payerPhone" class="col-sm-3 control-label">payerPhone</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-payerPhone" name="payerPhone" value="<?php echo $x_customer_phone; ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-payerFirstName" class="col-sm-3 control-label">payerFirstName</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-payerFirstName" name="payerFirstName" value="<?php echo $x_customer_first_name; ?>">
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-payerLastName" class="col-sm-3 control-label">payerLastName</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-payerLastName" name="payerLastName" value="<?php echo $x_customer_last_name; ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-payerTaxId" class="col-sm-3 control-label">payerTaxId</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-payerTaxId" name="payerTaxId" value="76774735479">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-payerTaxIdType" class="col-sm-3 control-label">payerTaxIdType</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-payerTaxIdType" name="payerTaxIdType" value="BR_CPF">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-shippingAddressRecipient" class="col-sm-3 control-label">shippingAddressRecipient</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-shippingAddressRecipient" name="shippingAddressRecipient" value="<?php echo $x_customer_first_name ?> <?php echo $x_customer_last_name ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-shippingAddressStreet1" class="col-sm-3 control-label">shippingAddressStreet1</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-shippingAddressStreet1" name="shippingAddressStreet1" value="<?php echo $x_customer_shipping_address1 ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-shippingAddressStreet2" class="col-sm-3 control-label">shippingAddressStreet2</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-shippingAddressStreet2" name="shippingAddressStreet2" value="<?php echo $x_customer_shipping_address2 ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-shippingAddressPostal" class="col-sm-3 control-label">shippingAddressPostal</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-shippingAddressPostal" name="shippingAddressPostal" value="<?php echo $x_customer_shipping_zip ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-shippingAddressCity" class="col-sm-3 control-label">shippingAddressCity</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-shippingAddressCity" name="shippingAddressCity" value="<?php echo $x_customer_shipping_city ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-shippingAddressCountry" class="col-sm-3 control-label">shippingAddressCountry</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-shippingAddressCountry" name="shippingAddressCountry" value="<?php echo $x_shop_country ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-shippingAddressState" class="col-sm-3 control-label">shippingAddressState</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-shippingAddressState" name="shippingAddressState" value="<?php echo $x_customer_shipping_state ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-disallowRememberedCards" class="col-sm-3 control-label">disallowRememberedCards</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-disallowRememberedCards" name="disallowRememberedCards">
        <option value="false">no, allow user to remember cards (False)</option>
        <option value="true"  selected="">yes, the user will have no option to remember cards (True)</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-rememberedCards" class="col-sm-3 control-label">rememberedCards</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-rememberedCards" name="rememberedCards" value="">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-button" class="col-sm-3 control-label">button</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-button" name="button">
        <option value="inside">Inside Button</option>
        <option value="outside" selected="">Outside Button</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-disableButton" class="col-sm-3 control-label">disableButton</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-disableButton" name="disableButton">
        <option value="no" selected="">Do not disable the Button.</option>
        <option value="yes">Disable the Button from the beginning.</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-checkout" class="col-sm-3 control-label">checkout</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-checkout" name="checkout">
        <option value="immediate" selected="">Merchant's Continue Button leads to XO immediately</option>
        <option value="elsewhere">Merchants pages are in between PSP and XO ("Elsewhere Button")</option>
        <option value="inline">Merchant's Continue Button leads to commit page ("Buy Now Button")</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-preselection" class="col-sm-3 control-label">preselection</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-preselection" name="preselection">
        <option value="none" selected="">Nothing is preselected</option>
        <option value="paypal">PayPal Wallet is preselected</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-surcharging" class="col-sm-3 control-label">surcharging</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-surcharging" name="surcharging">
        <option value="false" selected="">no</option>
        <option value="true">yes</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-hideAmount" class="col-sm-3 control-label">hideAmount</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-hideAmount" name="hideAmount">
        <option value="false" selected="">no</option>
        <option value="true">yes</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-userAction" class="col-sm-3 control-label">userAction</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-userAction" name="userAction">
        <option value="continue" selected="">Continue Flow</option>
        <option value="commit">Commit Flow</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-shopBackgroundStyle" class="col-sm-3 control-label">shopBackgroundStyle</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-shopBackgroundStyle" name="shopBackgroundStyle">
        <option value="" selected="">Default (white background)</option>
        <option value="background-color: #ff7700">Orange background</option>
        <option value="background-image: url(&quot;static/images/blue-stripes.jpg&quot;);">Repeating background image</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-allowPatchPaymentBeforeApproval" class="col-sm-3 control-label">allowPatchPaymentBeforeApproval</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-allowPatchPaymentBeforeApproval" name="allowPatchPaymentBeforeApproval">
        <option value="no" selected="">no</option>
        <option value="yes">yes</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-allowPatchPaymentThroughExecution" class="col-sm-3 control-label">allowPatchPaymentThroughExecution</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-allowPatchPaymentThroughExecution" name="allowPatchPaymentThroughExecution">
        <option value="no" selected="">no</option>
        <option value="yes">yes</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-paypalMode" class="col-sm-3 control-label">paypalMode</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-paypalMode" name="paypalMode">
        <option value="testing">Testing locally or on stage</option>
        <option value="sandbox">Sandbox</option>
        <option value="live" selected="">Live</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-thirdPartyPaymentMethods" class="col-sm-3 control-label">thirdPartyPaymentMethods</label>
    <div class="col-sm-7">


        <textarea class="form-control" id="cfgitem-thirdPartyPaymentMethods" name="thirdPartyPaymentMethods">[{"redirectUrl": "http://google.com", "methodName": "GOOGLE", "imageUrl": "https://www.google.com/logos/doodles/2014/world-cup-2014-11-6294918834159616.3-hp.gif", "description": "my super duper description"},{"redirectUrl": "http://google.com", "methodName": "Barzahlung bei Abholung", "description": "(zzgl. 2 % Servicepauschale)"},{"redirectUrl": "http://google.com", "methodName": "G&amp;ouml;&amp;ouml;gl&amp;egrave;", "description": "This is Gö&amp;ouml;gl&amp;egrave;'s description"}]</textarea>
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-customization" class="col-sm-3 control-label">customization</label>
    <div class="col-sm-7">


        <textarea class="form-control" id="cfgitem-customization" name="customization">{"psp": {     "font-family": "Times New Roman",      "color": "green",      "font-size": "14px",     "font-style": "italic"},"link": {     "color": "red",     "text-decoration": "underline" },"visited": {     "color": "green",     "text-decoration": "underline" },"active": {     "color": "yellow",     "text-decoration": "underline" },"hover": {     "color": "rgb(100, 66, 200)",     "text-decoration": "underline" }}</textarea>
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-endpoint" class="col-sm-3 control-label">endpoint</label>
    <div class="col-sm-7">


        <!--<input type="text" class="form-control" id="cfgitem-endpoint" name="endpoint" value="https://api.sandbox.paypal.com">-->
        <input type="text" class="form-control" id="cfgitem-endpoint" name="endpoint" value="https://api.paypal.com">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-clientId" style="color:#FF0000;" class="col-sm-3 control-label">clientId</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-clientId" name="clientId" value="<?php echo $r2d2[0]; ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-secret" style="color:#FF0000;" class="col-sm-3 control-label">secret</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-secret" name="secret" value="<?php echo $r2d2[1]; ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-experience_profile_id" style="color:#FF0000;" class="col-sm-3 control-label">experience_profile_id</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-secret" name="experience_profile_id" value="">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-returnUrl" class="col-sm-3 control-label">returnUrl</label>
    <div class="col-sm-7">


        <!--<input type="text" class="form-control" id="cfgitem-returnUrl" name="returnUrl" value="http://paypalplussampleshopbr-sandbox-9451.ccg21.dev.paypalcorp.com/PayPalPlusSampleShop-br/?action=commit">-->
        <input type="text" class="form-control" id="cfgitem-returnUrl" name="returnUrl" value="<?php echo $x_url_complete; ?>">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-cancelUrl" class="col-sm-3 control-label">cancelUrl</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-cancelUrl" name="cancelUrl" value="http://paypalplussampleshopbr-sandbox-9451.ccg21.dev.paypalcorp.com/PayPalPlusSampleShop-br/?action=immediate">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-ppplusBaseUrl" class="col-sm-3 control-label">ppplusBaseUrl</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-ppplusBaseUrl" name="ppplusBaseUrl" value="https://paypalplussampleshopbr-sandbox-9451.ccg21.dev.paypalcorp.com:8000/paymentwall">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-ppplusJsLibraryUrl" class="col-sm-3 control-label">ppplusJsLibraryUrl</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-ppplusJsLibraryUrl" name="ppplusJsLibraryUrl" value="https://www.paypalobjects.com/webstatic/ppplusdcc/ppplusdcc.min.js">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-ppplusJsLibraryCountry" class="col-sm-3 control-label">ppplusJsLibraryCountry</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-ppplusJsLibraryCountry" name="ppplusJsLibraryCountry">
        <option value="MX" selected="">Mexico (MX)</option>
        <option value="BR">Brazil (BR)</option>
        <option value="DE">Germany (DE)</option>
        <option value="US">United States (US)</option>
        <option value="AT">Austria (AT)</option>
        <option value="GB">Great Britain (GB)</option>
        <option value="UK">invalid value for Great Britain (UK)</option>
        <option value="">empty value</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-ppplusJsLibraryLang" class="col-sm-3 control-label">ppplusJsLibraryLang</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-ppplusJsLibraryLang" name="ppplusJsLibraryLang">
        <option value="es_MX" selected="">Spanish (es_MX)</option>
        <option value="en_US">German (en_US)</option>
        <option value="pt_BR">Portuguese (pt_BR)</option>
        <option value="de_DE">German (de_DE)</option>
        <option value="DE_de">German legacy (DE_de)</option>
        <option value="DE">German legacy (DE)</option>
        <option value="de">German legacy (de)</option>
        <option value="US_en">English legacy (US_en)</option>
        <option value="EN_us">English legacy (EN_us)</option>
        <option value="US">English legacy (US)</option>
        <option value="en">English legacy (en)</option>
        <option value="invalidTooLong">invalid value (longer than 5 chars)</option>
        <option value="invalidMinus">invalid value (dash)</option>
        <option value="">Use Default Language (en_US)</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-currency" class="col-sm-3 control-label">currency</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-currency" name="currency">
        <option value="EUR">Euro (EUR)</option>
        <option value="BRL">Brazilian Real (BRL)</option>
        <option value="<?php echo $x_currency ?>" selected="">Mexican Peso (MXN)</option>
        <option value="USD">US Dollar (USD)</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-passCallbacksForThirdPartyPaymentMethodSelection" class="col-sm-3 control-label">passCallbacksForThirdPartyPaymentMethodSelection</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-passCallbacksForThirdPartyPaymentMethodSelection" name="passCallbacksForThirdPartyPaymentMethodSelection">
        <option value="no" selected="">do not pass callbacks for select and deselect thirdPartyPaymentMethods</option>
        <option value="yes">pass callbacks for select and deselect thirdPartyPaymentMethods</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-simulateConfError" class="col-sm-3 control-label">simulateConfError</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-simulateConfError" name="simulateConfError">
        <option value="no" selected="">The Merchant configured the PP Object Correctly.</option>
        <option value="yes">Simulate bad configured PP Object.</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-enableConsoleLog" class="col-sm-3 control-label">enableConsoleLog</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-enableConsoleLog" name="enableConsoleLog">
        <option value="N" selected="">no</option>
        <option value="Y">yes</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-merchantAccountNo" class="col-sm-3 control-label">merchantAccountNo</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-merchantAccountNo" name="merchantAccountNo" value="1862703423878270419">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-ppplusBuyerEmail" class="col-sm-3 control-label">ppplusBuyerEmail</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-ppplusBuyerEmail" name="ppplusBuyerEmail" value="bbmmrroo@hotmail.com">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-checkoutUrl" class="col-sm-3 control-label">checkoutUrl</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-checkoutUrl" name="checkoutUrl" value="http://paypalplussampleshopbr-sandbox-9451.ccg21.dev.paypalcorp.com/PayPalPlusSampleShop-br/checkout-now">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-sslVersion" class="col-sm-3 control-label">sslVersion</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-sslVersion" name="sslVersion">
        <option value="SSLv1" selected="">SSLv1</option>
        <option value="SSLv3">SSLv3</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-sslVerifyHost" class="col-sm-3 control-label">sslVerifyHost</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-sslVerifyHost" name="sslVerifyHost">
        <option value="no" selected="">no</option>
        <option value="yes">yes</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-sslVerifyPeer" class="col-sm-3 control-label">sslVerifyPeer</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-sslVerifyPeer" name="sslVerifyPeer">
        <option value="no" selected="">no</option>
        <option value="yes">yes</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-bootstrapCss" class="col-sm-3 control-label">bootstrapCss</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-bootstrapCss" name="bootstrapCss">
        <option value="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" selected="">v3.1.1 (CDN: googleapis.com)</option>
        <option value="static/bootstrap/css/bootstrap.min.css">v3.1.1 (static, local)</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-bootstrapJs" class="col-sm-3 control-label">bootstrapJs</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-bootstrapJs" name="bootstrapJs">
        <option value="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" selected="">v3.1.1 (CDN: bootstrapcdn.com)</option>
        <option value="static/bootstrap/js/bootstrap.min.js">v3.1.1 (static, local)</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-jqueryJs" class="col-sm-3 control-label">jqueryJs</label>
    <div class="col-sm-7">

    <select class="form-control" id="cfgitem-jqueryJs" name="jqueryJs">
        <option value="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" selected="">Latest (CDN: googleapis.com)</option>
        <option value="static/jquery-1.11.1.min.js">v1.11.0 (static, local)</option>
    </select>
    </div>

</div>
<div class="form-group">
    <label for="cfgitem-template" class="col-sm-3 control-label">template</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-template" name="template" value="master">
    </div>
</div>
<div class="form-group">
    <label for="cfgitem-iframeHeight" class="col-sm-3 control-label">iframeHeight</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-iframeHeight" name="iframeHeight" value="">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-merchantInstallmentSelection" class="col-sm-3 control-label">merchantInstallmentSelection</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-merchantInstallmentSelection" name="merchantInstallmentSelection" value="1">
    </div>
</div>

<div class="form-group">
    <label for="cfgitem-merchantInstallmentSelectionOptional" class="col-sm-3 control-label">merchantInstallmentSelectionOptional</label>
    <div class="col-sm-7">


        <input type="text" class="form-control" id="cfgitem-merchantInstallmentSelectionOptional" name="merchantInstallmentSelectionOptional" value="true">
    </div>
</div>


<div class="form-group pull-right">
    <a href="WebExperienceProfile.html" class="btn btn-primary" role="button">Crear o Consultar XP</a>
    <button type="submit" class="btn btn-primary">Go to checkout</button>
</div>

</form>

</div>
</div>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="sys/Shop_files/bootstrap.min.js"></script>

	<script type="text/javascript">

		$( document ).ready(function() {
			$('#paypalform').submit();
		});

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
	<script src="sys/Shop_files/sample_shop.js"></script>

	

</body>
</html>